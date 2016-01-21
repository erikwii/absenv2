<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
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
        return $this->belongTo('App\Models\Course','Kode_Matkul','Kode_Matkul');
    }

    //check if this composite key already exist
    public static function isExist($pertemuan, $id_matkul){
        $count = DB::table('topics')
            ->where('pertemuan_ke', $pertemuan)
            ->where('Kode_Matkul', $id_matkul)
            ->count('*');
        if($count==1)
            return true;
        return false;
    }

}
