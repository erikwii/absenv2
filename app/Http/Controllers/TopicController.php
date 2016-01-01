<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use App\Models\Topic;
use App\Http\Requests;
//use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DB;

class TopicController extends Controller
{
    public function tambahtopik()
    {
        return view('lecturers.coursetopic');
    }

    public function simpantopik()
    {
        $input=Request::all();
        Topic::create($input);
        return redirect ('coursetopic');
    }

    public function showtopic()
    {
        $Topic = Topic::all();
       //$Topic = Topic::where('id_topik','=',$id_topik)->get()->first();
        return view('lecturers.showtopic')->with('Topic', $Topic);
    }


}