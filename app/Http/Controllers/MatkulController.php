<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
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

    public function createMatkul()
    {
        $prodis = Prodi::all();
        $prodi_arr=array();
        foreach($prodis as $prodi){
            $prodi_arr[$prodi->id]=$prodi->prodi;
        }

        //somehow must pass Kode_Dosen tp the next form
        //get current user
        $user = Auth::user();
        //from user get reference to lecturer
        $lecturer = $user->lecturer;
        //pass also Kode_Dosen
        $Kode_Dosen=$lecturer->Kode_Dosen;
        return view('lecturers.createcourse')->with('prodi_options',$prodi_arr)->with('Kode_Dosen',$Kode_Dosen);
    }

    /**
     * Normally we try taken form data with Request Controller but in this case we are using Facade
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function saveMatkul()
    {
        $input=Request::all();
        Course::create($input);
        //return view('lecturers.showcourse');
        //instead of redirect directly we call another function that do actual redirection
        return $this->showMatkul();
    }

    /**
     * We need to filter only course taught by this lecturer is shown
     * @return $this
     */
    public function showMatkul()
    {
        //get current user
        $user = Auth::user();
        //get the mapping for lecturer
        $kode_dosen = $user->lecturer->Kode_Dosen;
        $courses = Course::where('Kode_Dosen',$kode_dosen)->get();

        return view('lecturers.showcourse')->with('Courses', $courses);
    }
}