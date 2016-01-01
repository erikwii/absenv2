<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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

    //
    protected $fillable =[
        'pertemuan_ke',
        'Kode_Matkul',
        'tanggal',
        'nama_topik',
        'jumlah_mhs'
    ];

    //relationship
    public function courses()
    {
        return $this->hasMany('App\Models\Course');
    }

}
