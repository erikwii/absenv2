<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Topic;
use App\Helpers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class TopicController extends Controller
{
    public function __construct()
    {
        //attach auth middleware, if user not authenticated forward to login page
        $this->middleware('auth');
    }

    /**
     * Validator condition: jumlah_mhs (numeric), nama_topic (not null)
     * Plus both pertemuan_ke and kode_matkul must be composite unique
     * Todo: add extra condition rules number of students can't be greater than 50
     * @param array $data
     * @return mixed
     */
    protected function topic_validator(array $data)
    {
        $validator =Validator::make($data, [
            'nama_topik' => 'required',
            'junlah_mhs' => 'numeric',
        ]);

        //callback function is cannot be debugged
        $func_check_unique = function($validator) {
            if ($this->checkCompositeUnique($validator)) {
                $validator->errors()->add('field', 'This course with registered pertemuan ke has already been registered!');
            }
        };
        $validator->after($func_check_unique);
        return $validator;
    }

    /**
     * Round about solution to debug lambda function
     * @param $validator
     * @return bool
     */
    protected function checkCompositeUnique($validator){
        $pertemuan = $validator->getData()['pertemuan_ke'];
        $id_matkul = $validator->getData()['Kode_Matkul'];
        $course = Course::instanceByKodeMatkul($id_matkul);
        $stat = Topic::isExist($pertemuan,$course->seksi);
        if($stat)
            return true;
        return false;
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
        $courses=Course::courseMapByLecturerId($kode_dosen); //filter by code dosen
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function simpantopik(Request $request)
    {
        $input=$request->all();
        $validator = $this->topic_validator($input);
        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        //Topic::create($input);
        $topic = new Topic;
        $topic->pertemuan_ke=$input['pertemuan_ke'];
        $topic->tanggal=$input['tanggal'];
        //seek kode seksi given current Kode_Matkul & running semester
        $course = Course::instanceByKodeMatkul($input['Kode_Matkul']);
        $topic->kode_seksi=$course->seksi;
        $topic->nama_topik=$input['nama_topik'];
        $topic->jumlah_mhs=$input['jumlah_mhs'];
        $topic->save();
        //$topic
        return $this->showTopic();
    }

    /**
     * pass registered course such that user can select it from the select box
     * @return view to showtopic
     */
    public function showTopic()
    {
        //from course get all registered course for this semester
        $user = Auth::user();
        //get the mapping for lecturer
        $kode_dosen = $user->lecturer->Kode_Dosen;

        //get Kode_Matkul & Nama_Matkul from course, therefore not Courses Model instance
        $courses=Course::courseMapByLecturerId($kode_dosen); //filter by code dosen
        $courses_arr=Helpers::toAssociativeArrays($courses);
        $Topic = Topic::topicsByKodeDosen($kode_dosen);
        return view('lecturers.showtopic')->with('Topic', $Topic)->with('Courses',$courses_arr);
    }

    /**
     * Handle ajax, the function will be called twice
     * 1. For the first Ajax request, which further will invoke response for bodyonload (call the function again)
     * 2. Response to Ajax response by forwarding to actual view loaded with queried course_id
     * The reason for this two calling because in the first step, page is loaded asynchronously (not replaced in current page)
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showTopicFiltered(Request $request)
    {
        $user = Auth::user();
        //get the mapping for lecturer
        $kode_dosen = $user->lecturer->Kode_Dosen;

        //get Kode_Matkul & Nama_Matkul from course, therefore not Courses Model instance
        $courses=Course::courseMapByLecturerId($kode_dosen); //filter by code dosen
        $courses_arr=Helpers::toAssociativeArrays($courses);
        $course_id=$request['Kode_Matkul'];
        //need mapping from kode_matkul to kode_seksi
        $Topic = Topic::topicsByKodeMatkul($course_id);
        //filter by kode matkul registered, we do not required to filter by kode dosen since previous form already filtered it
        $input=$request->all();
        //debugging purpose
        $response = array(
            'response' => 'Called created successfully',
            '_token'=>$input['_token'],
            'Kode_Matkul'=>$course_id
        );

        //technically only post can only enter this function
        if (!array_key_exists('step',$input)){
            return response()->json($response);
        }

        return view('lecturers.showtopic')->with('Topic', $Topic)->with('Courses',$courses_arr);
    }

    public function editTopic($topic_id){
        $user = Auth::user();
        //get the mapping for lecturer
        $kode_dosen = $user->lecturer->Kode_Dosen;

        //get Kode_Matkul & Nama_Matkul from course
        $courses=Course::courseMapByLecturerId($kode_dosen); //filter by code dosen
        $courses_arr=Helpers::toAssociativeArrays($courses);
        $counter_pertemuan=array();
        for($i=1;$i<=16;$i++){
            $counter_pertemuan[$i]=$i;
        }

        //query again to get the correct data based on the given course_id
        $topic = Topic::topicById($topic_id);

        return view('lecturers.edittopic')->with('courses',$courses_arr)->with('counter_p',$counter_pertemuan)
            ->with('topic',$topic);
    }

    public function updateTopic(Request $request){
        $input=$request->all();
        //retrieve the relevant model with where condition
        $course=Topic::find($input['id_topik']);
        //$course->pertemuan_ke=$input['pertemuan_ke'];
        //$course->Kode_Matkul=$input['Kode_Matkul'];
        $course->tanggal=$input['tanggal'];
        $course->nama_topik=$input['nama_topik'];
        $course->jumlah_mhs=$input['jumlah_mhs'];
        $course->save();
        return $this->showTopic();
    }
}