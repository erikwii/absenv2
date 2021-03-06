<?php

namespace App\Http\Controllers;

use App\Helpers;
use App\Models\Kalender;
use App\Http\Requests;
use App\Models\Lecturer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Carbon\Carbon;
class LecturerController extends Controller
{
    public function __construct()
    {
        //attach auth middleware, if user not authenticated forward to login page
        $this->middleware('auth');
    }

    public function profildosen(){
        $user = Auth::user();
        $name = $user->name;
        $lecturer = $user->lecturer;
        $nidn = $lecturer->nidn;
        $kode_dosen = $lecturer->Kode_Dosen;
        $telepon = $lecturer->Telepon;
        return view('lecturers.profildosen',['name' => $name,'kode_dosen' => $kode_dosen,
            'nidn'=>$nidn,'telepon' => $telepon]);
    }

    public function updateProfilDosen(Request $request){
        $input = $request->all();

        $validator = $this->profile_validator($input);
        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $lecturer = Lecturer::find($input['Kode_Dosen']);
        $lecturer->Nama_Dosen=$input['Nama_Dosen'];
        $lecturer->Telepon=$input['Telepon'];
        $lecturer->save();
        return $this->profildosen();
    }

    protected function profile_validator(array $data){
        $validator =Validator::make($data, [
            'Telepon' => 'numeric',
        ]);
        return $validator;
    }

    public function AjaxReloadRekapDosenWithSemester(Request $request){
        //get list of semester
        $input=$request->all();

        $semester_id=$request['Semester'];
        $response = array(
            'response' => 'Called created successfully',
            '_token'=>$input['_token'],
            'Semester'=>$semester_id
        );

        //the first call to respond selectChange goes to here
        if (!array_key_exists('step',$input)){
            return response()->json($response);
        }

        //the second call to respond body.onload() from ajax goes here
        $kalender = Kalender::all('id','semester');;
        $kalender_array = Helpers::modelAsAssociativeArray($kalender,'id','semester');

        //get list of course sections for current semester and lecturer
        $lecturer = Auth::user()->lecturer;
        $kode_dosen = $lecturer->Kode_Dosen;
        $course_model = DB::table('courses')
            ->where('Kode_Dosen',$kode_dosen)
            ->where('id_semester',$semester_id);
        $course = $course_model->get();
        $course_array = Helpers::modelAsAssociativeArray($course,'seksi','Nama_Matkul');
        //make default showing first course on the list
        if(empty($course_array)) {
            $enrollment = array();
            $seksi=null;
        } else{
            $seksi=$course[0]->seksi;
            //pass along list of enrolled students
            $enrollment=$course_model
                ->where('seksi',$seksi)
                ->join('enrollments as e','e.kode_seksi','=','courses.seksi')
                ->join('students as s','s.Noreg','=','e.noreg')
                ->get();
        }

        return view('lecturers.rekap')
            ->with('kalender_options',$kalender_array)
            ->with('course_options',$course_array)
            ->with('course',$course)
            ->with('enrolls',$enrollment)
            ->with('semester_id',$semester_id)
            ->with('kode_seksi',$seksi);
    }

    public function postRekapDosen(Request $request){
        //get list of semester
        $kalender = Kalender::all('id','semester');;
        $kalender_array = Helpers::modelAsAssociativeArray($kalender,'id','semester');

        //get list of course sections for current semester and lecturer
        $lecturer = Auth::user()->lecturer;
        $kode_dosen = $lecturer->Kode_Dosen;

        $semester = $request->input('Semester');
        //for debugging
        $course_model = DB::table('courses')
            ->where('Kode_Dosen',$kode_dosen)
            ->where('id_semester',$semester);
        $course = $course_model->get();
        $course_array = Helpers::modelAsAssociativeArray($course,'seksi','Nama_Matkul');
        //make default showing first course on the list
        if(empty($course)) {
            $enrollment = array();
        } else{
            $seksi=$request->input('Kode_Seksi');
            //pass along list of enrolled students
            $enrollment=$course_model
                ->where('seksi',$seksi)
                ->join('enrollments as e','e.kode_seksi','=','courses.seksi')
                ->join('students as s','s.Noreg','=','e.noreg')
                ->get();
        }

        return view('lecturers.rekap')
            ->with('kalender_options',$kalender_array)
            ->with('course_options',$course_array)
            ->with('course',$course)
            ->with('enrolls',$enrollment)
            ->with('semester_id',$semester)
            ->with('kode_seksi',$seksi);
    }

    public function rekapDosen(Request $request){
        //get list of semester
        $kalender = Kalender::all('id','semester');
        $kalender_array = Helpers::modelAsAssociativeArray($kalender,'id','semester');

        //get list of course sections for current semester and lecturer
        $lecturer = Auth::user()->lecturer;
        $kode_dosen = $lecturer->Kode_Dosen;

        $semester = Kalender::getRunningSemester();
        $id_semester = !empty($semester) ? $semester->id : 0;
        //for debugging
        $course_model = DB::table('courses')
            ->where('Kode_Dosen',$kode_dosen)
            ->where('id_semester',$id_semester);

        $enrollment=array();
        $seksi=array();
        $course_array=array();
        $course=array();
        if(empty($course_model) || $course_model->count()==0) {

        } else{
            $course = $course_model->get();
            $course_array = Helpers::modelAsAssociativeArray($course,'seksi','Nama_Matkul');
            $seksi=$course[0]->seksi;
            //pass along list of enrolled students
            $enrollment=$course_model
                ->where('seksi',$seksi)
                ->join('enrollments as e','e.kode_seksi','=','courses.seksi')
                ->join('students as s','s.Noreg','=','e.noreg')
                ->get();
        }

        return view('lecturers.rekap')
            ->with('kalender_options',$kalender_array)
            ->with('course_options',$course_array)
            ->with('course',$course)
            ->with('enrolls',$enrollment)
            ->with('semester_id',$id_semester)
            ->with('kode_seksi',$seksi);
    }
}
