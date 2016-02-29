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
        return $this->belongsTo('App\Models\Student', 'noreg', 'Noreg');
    }

    /**
     * Default get current semester enrollment
     * @param $user_id
     * @return mixed
     */
    public static function courseByUser($user_id)
    {
        $id_semester = Kalender::getRunningSemester()->id;
        $instances = DB::select('SELECT e.id, c.seksi, c.Kode_Matkul,c.Nama_Matkul, c.day, c.time, c.Kode_Dosen,
          e.noreg, max(p.pertemuan_ke) as pertemuan, w.kode_waktu, w.waktu_start, w.waktu_end FROM `enrollments` as e
          left join courses as c on e.kode_seksi=c.seksi
          left join presences as p on c.seksi=p.kode_seksi
          left join waktu_kuliah as w on w.id=c.time
          where e.noreg=? and c.id_semester=?
          group by c.seksi',[$user_id,$id_semester]);
        return $instances;
    }

    /**
     * Get list of registered course for current semester per prodi
     * @param $prodi_id
     * @return mixed
     */
    public static function courseByUserProdi($prodi_id)
    {
        $id_semester = Kalender::getRunningSemester()->id;
        $instances = DB::select('SELECT e.id, c.seksi, c.Kode_Matkul,c.Nama_Matkul, c.day, c.time, c.Kode_Dosen,
          e.noreg, max(p.pertemuan_ke) as pertemuan, w.kode_waktu, w.waktu_start, w.waktu_end FROM `enrollments` as e
          inner join courses as c
          inner join presences as p
          inner join waktu_kuliah as w
          on e.kode_seksi=c.seksi and c.seksi=p.kode_seksi and w.id=c.time
          where c.prodi_id=? and c.id_semester=?
          group by c.seksi',[$prodi_id,$id_semester]);
        return $instances;
    }
}