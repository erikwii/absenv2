<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Support\Facades\Request;
use App\Models\Topic;
use App\Http\Requests;
use App\Helpers;

class TopicController extends Controller
{
    /**
     * Todo: must filter only shows courses whom are taught by this user
     * @return $this
     */
    public function tambahtopik()
    {
        //get Kode_Matkul & Nama_Matkul from course
        $courses=Course::instances();
        $courses_arr=Helpers::toAssociativeArrays($courses);
        $counter_pertemuan=array();
        for($i=1;$i<=16;$i++){
            $counter_pertemuan[$i]=$i;
        }
        return view('lecturers.coursetopic')->with('courses',$courses_arr)->with('counter_p',$counter_pertemuan);
    }

    public function simpantopik()
    {
        $input=Request::all();
        Topic::create($input);
        return view('lecturers.coursetopic');
    }

    public function showtopic()
    {
        $Topic = Topic::all();
        return view('lecturers.showtopic')->with('Topic', $Topic);
    }
}