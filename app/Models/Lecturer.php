<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'lecturers';
    protected $primaryKey='Kode_Dosen';
    public $timestamps=true;

    //
    protected $fillable =[
        'Kode_Dosen',
        'Nama_Dosen',
        'Telepon'
    ];

    public function getIdUserAttribute($value)
    {
        return $value;
    }

    public function setIdUserAttribute($value)
    {
        $this->attributes['id_user'] = $value;
    }

    /**
     * @return mixed
     */
    public function getKodeDosenAttribute($value)
    {
        return $value;
    }

    /**
     * @param mixed $Kode_Mhs
     */
    public function setKodeDosenAttribute($value)
    {
        $this->attributes['Kode_Dosen'] = $value;
    }

    public function getNamaDosenAttribute($value)
    {
        return $value;
    }

    public function setNamaDosenAttribute($value)
    {
        $this->attributes['Nama_Dosen'] = $value;
    }

    //accessor for Telepon
    public function getTeleponAttribute($value){
        return $value;
    }

    //mutator for Telepon
    public function setTeleponAttribute($value){
        $this->attributes['Telepon']=$value;
    }

    public function course(){
        return $this->hasMany('App\Models\Course','Kode_Dosen','Kode_Dosen');
    }
}
