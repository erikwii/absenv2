<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use App\Models\Lecturer;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
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
        $kode_dosen = $lecturer->Kode_Dosen;
        $telepon = $lecturer->Telepon;
        return view('lecturers.profildosen',['name'=>$name,'kode_dosen'=>$kode_dosen,'telepon'=>$telepon]);
    }

    public function rekapdosen(){
        return view('lecturers.rekap');
    }
}
