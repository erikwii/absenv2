<?php

namespace App\Http\Controllers;


use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

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
        return view('students.enroll');
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
