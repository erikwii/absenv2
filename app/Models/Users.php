<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Users extends Model
{
    protected $table = 'users';
    protected $primaryKey='id';
    public $timestamps=true;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    //RAW SQL extra to fetch latest id
    public static function getNextId($table_name){
        $table_stat=DB::select('SHOW TABLE STATUS where name= ?',[$table_name]);
        $id=$table_stat[0]->Auto_increment;
        if(is_null($id))
            return 0;
        return $id;
    }

    public function student(){
        return $this->hasOne('App\Models\Prodi','id_user','id');
    }
}
