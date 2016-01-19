<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use App\Models\Course;
use App\Http\Requests;
use App\Models\Prodi;

use Carbon\Carbon;
class MatkulController extends Controller
{
    public function __construct()
    {
        //attach auth middleware, if user not authenticated forward to login page
        $this->middleware('auth');
    }

    public function tambahMatkul()
    {
        $prodis = Prodi::all();
        $prodi_arr=array();
        foreach($prodis as $prodi){
            $prodi_arr[$prodi->id]=$prodi->prodi;
        }
        return view('lecturers.createcourse')->with('prodi_options',$prodi_arr);
    }

    public function simpanMatkul()
    {
        $input=Request::all();
        Course::create($input);
        return redirect ('createcourse');
    }

    public function showMatkul()
    {
        $Course = Course::all();
       //$Course = Course::where('Kode_Matkul','=',$Kode_Matkul)->get()->first();
        return view('lecturers.showCourse')->with('Course', $Course);
    }
}