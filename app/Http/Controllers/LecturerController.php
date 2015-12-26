<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use App\Models\Lecturer;
use App\Http\Requests;
//use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
class LecturerController extends Controller
{ public function profildosen(){
    return view('lecturers.profildosen');
    }
    public function coursetopic(){
        return view('lecturers.coursetopic');
    }
    public function rekapdosen(){
        return view('lecturers.rekapdosen');
    }
    public function createcourse(){
        return view('lecturers.createcourse');
    }
}
