<?php
/**
 * Created by PhpStorm.
 * User: eka
 * Date: 25/01/16
 * Time: 11:43
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Enrollment extends Model
{
    protected $table='enrollments';
    protected $primaryKey = 'id';

    protected $fillable = [
        'kode_seksi',
        'noreg'
    ];

    //get mapping to courses
    public function courses(){
        return $this->belongsTo('App\Models\Course','kode_seksi','seksi');
    }

    //get mapping to student
    public function student(){
        return $this->belongsTo('App\Mdeols\Student','noreg','Noreg');
    }

    public static function courseByUser($user_id){
        $id_semester = Kalender::getRunningSemester()->id;
        $instances=DB::table('courses')
            ->where('courses.id_semester',$id_semester)
            ->where('students.Noreg',$user_id)
            ->join('enrollments','enrollments.kode_seksi','=','courses.seksi')
            ->join('students','enrollments.noreg','=','students.Noreg')
            ->select('courses.seksi','courses.Kode_Matkul','courses.Nama_Matkul')
            ->get();
        return $instances;
    }
}