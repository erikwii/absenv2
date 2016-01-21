<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Topic;
use App\Helpers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Factory;

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
     * @param array $data
     * @return mixed
     */
    protected function topic_validator(array $data)
    {
        $validator =Validator::make($data, [
            'nama_topik' => 'required',
            'junlah_mhs' => 'numeric',
        ]);

        $func_check_unique = function($validator) {
            if ($this->checkCompositeUnique($validator)) {
                $validator->errors()->add('field', 'This course with registered pertemuan ke has already been registered!');
            }
        };
        $validator->after($func_check_unique);
        return $validator;
    }

    protected function checkCompositeUnique($validator){
        $pertemuan = $validator->getData()['pertemuan_ke'];
        $id_matkul = $validator->getData()['Kode_Matkul'];
        $stat = Topic::isExist($pertemuan,$id_matkul);
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
     * Todo: Add Validator jumlah_mhs must be numeric (onprogress unfinished)
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

        Topic::create($input);
        return $this->showtopic();
    }

    public function showtopic()
    {
        $Topic = Topic::all();
        return view('lecturers.showtopic')->with('Topic', $Topic);
    }
}