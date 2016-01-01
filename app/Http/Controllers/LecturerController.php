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
    /*public function __construct()
    {
        //attach auth middleware, if user not authenticated forward to login page
        $user=Auth::user();
        $this->middleware('auth');
    }*/

    public function profildosen(){
        $user = Auth::user();
        //$user_data = $request->user();
        $name = $user['attributes']['name'];
        $lecturer = Lecturer::where('Nama_Dosen',$name)->take(1)->get();
        //$student
        $kode_dosen = $lecturer[0]['attributes']['Kode_Dosen'];

        $telepon = $lecturer[0]['attributes']['Telepon'];
        return view('lecturers.profildosen',['name'=>$name,'kode_dosen'=>$kode_dosen,'telepon'=>$telepon]);

    }

    public function rekapdosen(){
        return view('lecturers.rekap');
    }
    public function createcourse(){
        return view('lecturers.createcourse');
    }
}
