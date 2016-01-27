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
use Illuminate\Support\Facades\Auth;

class Enrollment extends Model
{
    protected $table = 'enrollments';
    protected $primaryKey = 'id';

    protected $fillable = [
        'kode_seksi',
        'noreg'
    ];

    //get mapping to courses
    public function courses()
    {
        return $this->belongsTo('App\Models\Course', 'kode_seksi', 'seksi');
    }

    //get mapping to student
    public function student()
    {
        return $this->belongsTo('App\Mdeols\Student', 'noreg', 'Noreg');
    }

    /**
     * @param $user_id
     * @return mixed
     */
    public static function courseByUser($user_id)
    {
        $id_semester = Kalender::getRunningSemester()->id;
        /*
        $instances=DB::table('courses')
            ->where('courses.id_semester',$id_semester)
            ->where('students.Noreg',$user_id)
            ->join('enrollments','enrollments.kode_seksi','=','courses.seksi')
            ->join('students','enrollments.noreg','=','students.Noreg')
            ->join('waktu_kuliah','courses.time','=','waktu_kuliah.id')
            ->join('presences','presences.kode_seksi','=','courses.seksi')
            ->select('courses.seksi', 'courses.Kode_Matkul', 'courses.Nama_Matkul',
                'courses.day', 'courses.time', 'waktu_kuliah.kode_waktu',
                'waktu_kuliah.waktu_start', 'waktu_kuliah.waktu_end','presences.pertemuan_ke')
            ->groupBy('courses.seksi')
            ->get();
        */
        $user = Auth::user();
        $instances = DB::select('SELECT e.id, c.seksi, c.Kode_Matkul,c.Nama_Matkul, c.day, c.time, c.Kode_Dosen,
          e.noreg, max(p.pertemuan_ke) as pertemuan, w.kode_waktu, w.waktu_start, w.waktu_end FROM `enrollments` as e
          inner join courses as c
          inner join presences as p
          inner join waktu_kuliah as w
          on e.kode_seksi=c.seksi and c.seksi=p.kode_seksi and w.id=c.time
          where e.noreg=?
          group by c.seksi',[$user->student->Noreg]);
        return $instances;
    }
}