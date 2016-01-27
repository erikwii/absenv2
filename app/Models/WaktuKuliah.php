<?php
/**
 * Created by PhpStorm.
 * User: eka
 * Date: 27/01/16
 * Time: 7:44
 */

namespace app\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class WaktuKuliah extends Model
{
    protected $table='waktu_kuliah';
    protected $primaryKey = 'id';

    protected $fillable = [
        'kode_waktu',
        'waktu_start',
        'waktu_end'
    ];

    public static function waku_map(){
        $instance = DB::table('waktu_kuliah')->select('id','kode_waktu')->get();
        return $instance;
    }
}