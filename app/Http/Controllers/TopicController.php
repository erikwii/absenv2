<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Support\Facades\Request;
use App\Models\Topic;
use App\Http\Requests;
use App\Helpers;
use Illuminate\Support\Facades\Auth;

class TopicController extends Controller
{
    public function __construct()
    {
        //attach auth middleware, if user not authenticated forward to login page
        $this->middleware('auth');
    }
    /**
     * @return $this
     */
    public function tambahtopik()
    {
        $user = Auth::user();
        //get the mapping for lecturer
        $kode_dosen = $user->lecturer->Kode_Dosen;

        //get Kode_Matkul & Nama_Matkul from course
        $courses=Course::instancesByCourseId($kode_dosen); //filter by code dosen
        $courses_arr=Helpers::toAssociativeArrays($courses);
        $counter_pertemuan=array();
        for($i=1;$i<=16;$i++){
            $counter_pertemuan[$i]=$i;
        }

        //forward to another if null
        if(is_null($courses) || count($courses)==0){
            return view('lecturers.notopic');
        }
        return view('lecturers.coursetopic')->with('courses',$courses_arr)->with('counter_p',$counter_pertemuan);
    }

    /**
     * Todo: Add Validator jumlah_mhs must be numeric
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function simpantopik()
    {
        $input=Request::all();
        Topic::create($input);
        return view('lecturers.showtopic');
    }

    public function showtopic()
    {
        $Topic = Topic::all();
        return view('lecturers.showtopic')->with('Topic', $Topic);
    }
}