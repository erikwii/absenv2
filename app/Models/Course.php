<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Course extends Model
{
    //
    protected $table = 'courses';

    /**
     * The database table primary key.
     *
     * @var string
     */
    protected $primaryKey = 'seksi';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Kode_Matkul',
        'Nama_Matkul',
        'SKS',
        'prodi_id',
        'day',
        'time',
        'course_start_day',
        'Kode_Dosen',
        'id_ruang',
        'id_semester'
    ];

    //relationships

    /**
     * A Routine is owned by an User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function topic()
    {
        return $this->hasMany('App\Models\Topic','Kode_Matkul','Kode_Matkul');
    }

    public function prodi(){
        return $this->hasOne('App\Models\Prodi','id','prodi_id');
    }

    public function room(){
        return $this->hasOne('App\Models\Room','id_ruang','id_ruang');
    }

    /**
     * Mapping to kalender
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function kalender(){
        return $this->hasOne('App\Models\Kalender','id','id_semester');
    }

    /**
     * Alternative approach to get all instance of course but with ascending order
     * We can achieve similar result with pure Eloquent, might be further enhanced in the future for more complex query
     * @return mixed
     */
    public static function instances(){
        $instance = DB::table('courses')->select('Kode_Matkul','Nama_Matkul')->orderBy('Kode_Matkul','asc')->get();
        return $instance;
    }

    /**
     * Get the list of courses taught by this lecturer filtered by currently running semester (default)
     * @param $lecturer_id
     * @return mixed
     */
    public static function courseMapByLecturerId($lecturer_id){
        $id_semester = Kalender::getRunningSemester()->id;

        $instance = DB::table('courses')->select('Kode_Matkul','Nama_Matkul')
            ->where('Kode_Dosen',$lecturer_id)
            ->where('id_semester',$id_semester)
            ->orderBy('Kode_Matkul','asc')
            ->get();
        return $instance;
    }

    public static function sectionMapByLecturerId($lecturer_id){
        $id_semester = Kalender::getRunningSemester()->id;

        $instance = DB::table('courses')->select('seksi','Nama_Matkul')
            ->where('Kode_Dosen',$lecturer_id)
            ->where('id_semester',$id_semester)
            ->get();
        return $instance;
    }

    public static function instanceByLecturerId($lecturer_id){
        $id_semester = Kalender::getRunningSemester()->id;
        $instance = DB::table('courses')
            ->where('Kode_Dosen',$lecturer_id)
            ->where('id_semester',$id_semester)
            ->orderBy('Kode_Matkul','asc')
            ->get();
        return $instance;
    }

    public static function instanceByKodeMatkul($course_id){
        $id_semester = Kalender::getRunningSemester()->id;
        $instance = DB::table('courses')
            ->where('Kode_Matkul',$course_id)
            ->where('id_semester',$id_semester)
            ->orderBy('Kode_Matkul','asc')
            ->first();

        return $instance;
    }
}
