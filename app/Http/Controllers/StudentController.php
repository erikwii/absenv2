<?php

namespace App\Http\Controllers;


use App\Models\Student;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class StudentController extends Controller
{
    public function __construct()
    {
        //attach auth middleware, if user not authenticated forward to login page
        $user=Auth::user();
        $this->middleware('auth');
    }

    public function profil()
    {
        $user = Auth::user();
        //$user_data = $request->user();
        $name = $user['attributes']['name'];
        $student = Student::where('Nama_Mhs',$name)->take(1)->get();
        //$student
        $noreg = $student[0]['attributes']['Noreg'];
        return view('students.profil',['name'=>$name,'noreg'=>$noreg]);
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
