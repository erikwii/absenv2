<?php
/**
 * Created by PhpStorm.
 * User: eka
 * Date: 10/02/16
 * Time: 22:01
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admins';
    protected $primaryKey='id';
    public $timestamps=true;

    //
    protected $fillable =[
        'Nama_Admin',
        'Alamat',
        'Telepon',
        'id_user'
    ];
}