<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use App\Models\students;
use App\Http\Requests;
//use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
class StudentController extends Controller
{ public function profil(){

    return view('students.profil');

    }
}
