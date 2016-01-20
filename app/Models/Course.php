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
    protected $primaryKey = 'Kode_Matkul';

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
        'Kode_Dosen'
    ];

    //relationships

    /**
     * A Routine is owned by an User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function topic()
    {
        return $this->belongsTo('App\Models\Topic');
    }

    public function prodi(){
        return $this->hasOne('App\Models\Prodi','id','prodi_id');
        //return $this->belongsTo('App\Models\Prodi','prodi_id','id');
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
}
