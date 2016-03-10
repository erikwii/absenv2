<?php

namespace App\Http\Controllers;


use App\Helpers;
use App\Models\Enrollment;
use App\Models\Presence;
use App\Models\Prodi;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Kalender;
use App\Models\Course;

class StudentController extends Controller
{
    public function __construct()
    {
        //attach auth middleware, if user not authenticated forward to login page
        //$user=Auth::user();
        $this->middleware('auth');
    }

    public function profil()
    {
        $user = Auth::user();
        //$user_data = $request->user();
        $id = $user->id;
        $student = Student::where('id_user',$id)->first();
        //$student
        $name = $student->Nama_Mhs;
        $noreg = $student->Noreg;
        $prodi_model=$student->prodi;
        $prodi_id = $prodi_model->id;
        $prodi_name = $prodi_model->prodi;
        $semester = $student->Semester;
        $alamat = $student->Alamat;
        $telepon = $student->Telepon;
        $mac = $student->Mac;

        $prodis = Prodi::all();
        $prodi_arr=Helpers::modelAsAssociativeArray($prodis,'id','prodi');
        return view('students.profil',['name'=>$name,'noreg'=>$noreg,'prodi'=>$prodi_name,'semester'=>$semester,
            'alamat'=>$alamat,'telepon'=>$telepon,'mac'=>$mac,'prodi_opts'=>$prodi_arr,'prodi_id'=>$prodi_id]);
    }

    public function updateProfil(Request $request){
        $input = $request->all();

        $validator = $this->profile_validator($input);
        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $student=Student::find($input['Noreg']);
        $student->Noreg = $input['Noreg'];
        $student->Nama_Mhs = $input['Nama_Mhs'];
        $student->Prodi_id = $input['Prodi_id'];
        $student->Alamat = $input['Alamat'];
        $student->Telepon = $input['Telepon'];
        $student->Semester = $input['Semester'];
        $student->Mac = $input['Mac'];
        $student->save();
        return $this->profil();
    }

    public function enrollmhs()
    {
        //pass along all enrolled course by this user
        $user=Auth::user();
        $noreg=$user->student->Noreg;
        $prodi_id=$user->student->Prodi_id;
        $enrollment = Enrollment::courseByUser($noreg);
        return view('students.enroll')->with('enrollments',$enrollment);
    }

    /**
     * Todo: Add validator to check wether current course has not been registered nor existed
     * @param Request $request
     * @return $this
     */
    public function saveenrollment(Request $request){
        $input = $request->all();

        $validator = $this->enrollment_validator($input);
        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        //get data from the form
        $enrollment = new Enrollment;
        $enrollment->kode_seksi = $input['kode_seksi'];
        //query noreg from current user
        $user = Auth::user();
        $noreg = Student::where('id_user',$user->id)->first()->Noreg;
        $enrollment->noreg=$noreg;
        $enrollment->save();
        return $this->enrollmhs();
    }

    /**
     * Student can only register presence on the given day and time
     * @return mixed
     */
    public function inputabsen()
    {
        $counter_pertemuan=array();
        for($i=1;$i<=16;$i++){
            $counter_pertemuan[$i]=$i;
        }
        $user=Auth::user();
        $noreg=$user->student->Noreg;
        $enrollment = Enrollment::courseByUser($noreg);
        return view('students.inputabsen')
            ->with('pertemuan',$counter_pertemuan)
            ->with('enrollments',$enrollment)
            ->with('noreg',$noreg);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function saveabsen(Request $request){
        $input = $request->all();
        $validator = $this->presences_validator($input);
        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $presence = new Presence;
        $presence->pertemuan_ke = $request->pertemuan;
        $presence->kode_seksi = $request->seksi;
        //query current date time
        $date = Date('Y-m-d G:i:s');
        $presence->tanggal=$date;
        $presence->Noreg=$request->noreg;
        $presence->kehadiran=1;
        $presence->save();
        return $this->inputabsen();
    }

    protected function profile_validator(array $data){
        $validator =Validator::make($data, [
            'Telepon' => 'numeric',
        ]);
        return $validator;
    }

    protected function enrollment_validator(array  $data){
        $validator =Validator::make($data, [
            'kode_seksi' => 'numeric', //dummy placeholder to create validator object
        ]);

        //callback function cannot be debugged
        $func = function($validator) {
            //but we can debug if anonymous function calls another function
            if ($this->checkSectionId($validator)) {
                $validator->errors()->add('field', 'This section id is not registered!');
            }
            if($this->checkIsEnrolled($validator)){
                $validator->errors()->add('field', 'This section id has been enrolled!');
            }
        };
        $validator->after($func);
        return $validator;
    }

    protected function checkSectionId($validator){
        $seksi = $validator->getData()['kode_seksi'];
        $id_semester = Kalender::getRunningSemester()->id;
        $instance = Course::where('seksi',$seksi)
            ->where('id_semester',$id_semester)
            ->get();
        if(count($instance)==0)
            return true;
        return false;
        //the precondition for being add, section id must not exist for current user or has been registered
    }

    protected function checkIsEnrolled($validator){
        $seksi = $validator->getData()['kode_seksi'];
        $user = Auth::user();
        $noreg = $user->student->Noreg;
        $instance = Enrollment::where('kode_seksi',$seksi)
            ->where('noreg',$noreg)
            ->get();
        if(count($instance))
            return true;
        return false;
    }

    protected function presences_validator(array $data)
    {
        $validator =Validator::make($data, [
            'pertemuan_ke' => 'numeric', //dummy placeholder to create validator object
        ]);

        //callback function cannot be debugged
        $func_check_unique = function($validator) {
            //but we can debug if anonymous function calls another function
            if ($this->checkCompositeUnique($validator)) {
                $validator->errors()->add('field', 'This presence with the same pertemuan and kode_seksi is exist!');
            }
        };
        $validator->after($func_check_unique);
        return $validator;
    }

    /**
     * Round about solution to debug lambda function
     * @param $validator
     * @return bool
     */
    protected function checkCompositeUnique($validator){
        $pertemuan = $validator->getData()['pertemuan_ke'];
        $seksi = $validator->getData()['seksi'];
        $stat = Presence::isExist($pertemuan,$seksi);
        if($stat)
            return true;
        return false;
    }


    public function lihatabsen()
    {
        //need to pass along current student registration
        $user = Auth::user()->student;
        //get list of enrolled section
        $enroll = $user->enrollment;
        $counter_pertemuan=array();
        for($i=1;$i<=16;$i++){
            $counter_pertemuan[$i]=$i;
        }

        return view('students.lihatabsen')->with('enrollments',$enroll)->with('pertemuan',$counter_pertemuan);
    }
}
