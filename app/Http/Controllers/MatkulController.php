<?php

namespace App\Http\Controllers;

use App\Helpers;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Models\Prodi;
use App\Models\Room;
use App\Models\Kalender;
use App\Models\WaktuKuliah;

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

        $room = Room::room_name();
        $room_arr = Helpers::toAssociativeArrays($room);

        //somehow must pass Kode_Dosen to the next form
        //get current user
        $user = Auth::user();
        //from user get reference to lecturer
        $lecturer = $user->lecturer;
        //pass also Kode_Dosen
        $Kode_Dosen=$lecturer->Kode_Dosen;
        //pass also waktu mapping
        $waktu_kuliah = WaktuKuliah::waktuMap();
        $waktu_opts = Helpers::toAssociativeArrays($waktu_kuliah);
        return view('lecturers.createcourse')
            ->with('prodi_options',$prodi_arr)
            ->with('Kode_Dosen',$Kode_Dosen)
            ->with('room_options', $room_arr)
            ->with('waktu_options',$waktu_opts);
    }

    public function editMatkul($id_course){
        $course=Course::where('seksi',$id_course)->first();
        //get all prodi information
        $prodis = Prodi::all();
        //transform prodi to associative array
        $prodi_arr=array();
        foreach($prodis as $prodi){
            $prodi_arr[$prodi->id]=$prodi->prodi;
        }
        $kode_dosen=$course->Kode_Dosen;
        //need to pass filled data to this view (extra parameter)
        $room = Room::room_name();
        $room_arr = Helpers::toAssociativeArrays($room);
        $waktu_kuliah = WaktuKuliah::waktuMap();
        $waktu_opts = Helpers::toAssociativeArrays($waktu_kuliah);
        return view('lecturers.editcourse')
            ->with('prodi_options',$prodi_arr)
            ->with('Kode_Dosen',$kode_dosen)
            ->with('room_options',$room_arr)
            ->with('course',$course)
            ->with('waktu_options',$waktu_opts);
    }

    /**
     * Normally we try taken form data with Request Controller but in this case we are using Facade
     * Todo: Add Validator (Critical, after all core business function is implemented)
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function saveMatkul()
    {
        $input=Request::all();
        //Course::create($input);
        $course = new Course;
        $course->Kode_Matkul=$input['Kode_Matkul'];
        $course->Nama_Matkul=$input['Nama_Matkul'];
        $course->SKS=$input['SKS'];
        $course->prodi_id=$input['prodi_id'];
        $course->day=$input['day'];
        $course->id_ruang=$input['id_ruang'];
        $course->time=$input['time'];
        $course->Kode_Dosen=$input['Kode_Dosen'];
        $semester = Kalender::getRunningSemester();
        $course->id_semester=$semester->id;
        $course->course_start_day=$input['course_start_day'];
        $course->save();
        return $this->showMatkul();
    }

    /**
     * Todo: Add Validator
     * @return MatkulController
     */
    public function updateMatkul(){
        $input=Request::all();
        //retrieve the relevant model with where condition
        $course=Course::find($input['seksi']);
        $course->Nama_Matkul=$input['Nama_Matkul'];
        $course->SKS=$input['SKS'];
        $course->prodi_id=$input['prodi_id'];
        $course->day=$input['day'];
        $course->id_ruang=$input['id_ruang'];
        $course->time=$input['time'];
        $course->course_start_day=$input['course_start_day'];
        $course->save();
        return $this->showMatkul();
    }

    /**
     * Show all course only taught by this lecturer on current semester
     * @return $this
     */
    public function showMatkul()
    {
        //get current user
        $user = Auth::user();
        //get the mapping for lecturer
        $kode_dosen = $user->lecturer->Kode_Dosen;
        $id_semester = Kalender::getRunningSemester()->id;
        $courses = Course::where('Kode_Dosen',$kode_dosen)
            ->where('id_semester',$id_semester)
            ->get();
        return view('lecturers.showcourse')->with('Courses', $courses);
    }
}