<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kalender;

class Topic extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'topics';
    protected $primaryKey='id_topik';
    public $timestamps=true;

    protected $id_semester;
    //
    protected $fillable =[
        'pertemuan_ke',
        'kode_seksi',
        'tanggal',
        'nama_topik',
        'jumlah_mhs'
    ];

    public function __construct(array $attributes)
    {
        parent::__construct($attributes);
        $id_semester = Kalender::getRunningSemester()->id;
    }

    //relationship
    public function courses()
    {
        return $this->belongTo('App\Models\Course','Kode_Matkul','Kode_Matkul');
    }

    public static function topicsByKodeDosen($lecturer_id){
        $topics = DB::table('topics')
                ->join('courses','topics.kode_seksi','=','courses.seksi')
                ->where('Kode_Dosen',$lecturer_id)
                ->get();
        return $topics;
    }

    public static function topicsByKodeMatkul($course_id){
        $id_semester = Kalender::getRunningSemester()->id;
        $topic = DB::table('topics')
            ->where('courses.Kode_Matkul',$course_id)
            ->where('courses.id_semester',$id_semester)
            ->join('courses','courses.seksi','=','topics.kode_seksi')
            ->select('topics.*','courses.Kode_Matkul','courses.Nama_Matkul','courses.id_semester')
            ->get();
        return $topic;
    }

    /**
     * Deprecated due to database change use instead kode_seksi
     * @param $course_id
     * @return mixed
     */
    public static function topicsByKodeSeksi($kode_seksi){
        $topics = DB::table('topics')
            ->where('kode_seksi',$kode_seksi)
            ->get();
        return $topics;
    }

    //check if this composite key already exist
    public static function isExist($pertemuan, $kode_seksi){
        $count = DB::table('topics')
            ->where('pertemuan_ke', $pertemuan)
            ->where('kode_seksi', $kode_seksi)
            ->count('*');
        if($count==1)
            return true;
        return false;
    }

    //need to do join with course to get Kode_Matkul
    public static function topicById($id){
        $topic = DB::table('topics')
            ->where('id_topik',$id)
            ->join('courses','courses.seksi','=','topics.kode_seksi')
            ->select('topics.*','courses.Kode_Matkul','courses.Nama_Matkul')
            ->first();
        return $topic;
    }
}
