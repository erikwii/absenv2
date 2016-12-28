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

    public static function waktuMap(){
        $instance = DB::table('waktu_kuliah')->select('id','kode_waktu')->get();
        return $instance;
    }

    /**
     * Given current time get correct Kode_waktu
     * @param $timestamp
     * @return mixed
     */
    public static function getKodeWaktuByTime($timestamp){
        //$stat = DB::select('select ? between ? and ? as result',[$current_time, $time_start, $time_end]);
        $instance = DB::select('select kode_waktu from waktu_kuliah where ? between waktu_start and waktu_end',[$timestamp]);
        if(count($instance)>0)
            return $instance[0]->kode_waktu;
        return null;
    }
}