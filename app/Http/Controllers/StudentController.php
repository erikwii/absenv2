<?php

namespace App\Http\Controllers;


use App\Helpers;
use App\Models\Enrollment;
use App\Models\Presence;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $prodi_name = $prodi_model->prodi;
        $semester = $student->Semester;
        $alamat = $student->Alamat;
        $telepon = $student->Telepon;
        return view('students.profil',['name'=>$name,'noreg'=>$noreg,'prodi'=>$prodi_name,'semester'=>$semester,'alamat'=>$alamat,'telepon'=>$telepon]);
    }

    public function enrollmhs()
    {
        //pass along all enrolled course by this user
        $user=Auth::user();
        $noreg=$user->student->Noreg;
        $enrollment = Enrollment::courseByUser($noreg);
        //for now let's pass along content of enrollment
        return view('students.enroll')->with('enrollments',$enrollment);
    }

    public function saveenrollment(Request $request){
        $input = $request->all();
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
     * Todo: make $counter_pertemuan adaptive, based on select box latest value
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

    /**
     * Round about solution to debug lambda function
     * @param $validator
     * @return bool
     */
    public static function checkCompositeUnique($validator){
        $pertemuan = $validator->getData()['pertemuan_ke'];
        $seksi = $validator->getData()['kode_seksi'];
        $stat = Presence::isExist($pertemuan,$seksi);
        if($stat)
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
