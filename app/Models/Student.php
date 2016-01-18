<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'students';
    protected $primaryKey='Noreg';
    public $timestamps=true;


    protected $fillable = [
        'Noreg',
        'Nama_Mhs',
        'Prodi_Id',
        'Alamat',
        'Telepon',
        'Semester',
        'id_user'
    ];

    //get the prodi mapping
    public function prodi(){
        return $this->hasOne('App\Models\Prodi','id','Prodi_Id');
    }

    //accessor for id_user
    public function getIdUserAttribute($value){
        return $value;
    }

    //mutator for Noreg
    public function setIdUserAttribute($value){
        $this->attributes['id_user']=$value;
    }

    //accessor for Noreg
    public function getNoregAttribute($value){
        return $value;
    }

    //mutator for Noreg
    public function setNoregAttribute($value){
        $this->attributes['Noreg']=$value;
    }

    //accessor for Nama_Mhs
    public function getNamaMhsAttribute($value){
        return $value;
    }

    //mutator for Nama_Mhs
    public function setNamaMhsAttribute($value){
        $this->attributes['Nama_Mhs']=$value;
    }

    //accessor for Prodi
    public function getProdiIdAttribute($value){
        return $value;
    }

    //mutator for Prodi
    public function setProdiIdAttribute($value){
        $this->attributes['Prodi_Id']=$value;
    }

    //accessor for Alamat
    public function getAlamatAttribute($value){
        return $value;
    }

    //mutator for Alamat
    public function setAlamatAttribute($value){
        $this->attributes['Alamat']=$value;
    }

    //accessor for Telepon
    public function getTeleponAttribute($value){
        return $value;
    }

    //mutator for Telepon
    public function setTeleponAttribute($value){
        $this->attributes['Telepon']=$value;
    }

    //accesspr for Semester
    public function getSemesterAttribute($value){
        return $value;
    }

    //mutator for Semester
    public function setSemesterAttribute($value){
        $this->attributes['Semester']=$value;
    }
}
