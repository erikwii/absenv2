<?php

namespace App\Http\Controllers;


use App\Models\Enrollment;
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

    public function inputabsen()
    {
        return view('students.inputabsen');
    }

    public function lihatabsen()
    {
        return view('students.lihatabsen');
    }
}
