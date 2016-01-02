<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use App\Models\Course;
use App\Http\Requests;
//use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
class MatkulController extends Controller
{
    public function tambahMatkul()
    {
        return view('lecturers.createcourse');
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