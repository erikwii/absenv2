<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
        'prodi',
        'day',
        'time',
        'course_start_day'

    ];

    //relationships

    /**
     * A Routine is owned by an User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Topic()
    {
        return $this->belongsTo('App\Models\Topic');
    }
}
