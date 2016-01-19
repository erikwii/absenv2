<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
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
        //get all prodi information
        $prodis = Prodi::all();
        //transform prodi to associative array
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

    public function editMatkul($id_matkul){
        $course=Course::where('Kode_matkul',$id_matkul)->first();
        //get all prodi information
        $prodis = Prodi::all();
        //transform prodi to associative array
        $prodi_arr=array();
        foreach($prodis as $prodi){
            $prodi_arr[$prodi->id]=$prodi->prodi;
        }
        $kode_dosen=$course->Kode_Dosen;
        //need to pass filled data to this view (extra parameter)
        return view('lecturers.editcourse')->with('prodi_options',$prodi_arr)->with('Kode_Dosen',$kode_dosen)->with('course',$course);
    }

    /**
     * Normally we try taken form data with Request Controller but in this case we are using Facade
     * Missing: Add Validator (Priority 2nd, after all core business function is implemented)
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

    public function updateMatkul(){
        $input=Request::all();
        //retrieve the relevant model with where condition
        $course=Course::find($input['Kode_Matkul']);
        $course->Nama_Matkul=$input['Nama_Matkul'];
        $course->SKS=$input['SKS'];
        $course->prodi_id=$input['prodi_id'];
        $course->day=$input['day'];
        $course->time=$input['time'];
        $course->course_start_day=$input['course_start_day'];
        $course->save();
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