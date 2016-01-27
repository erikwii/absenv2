<?php
/**
 * Created by PhpStorm.
 * User: eka
 * Date: 27/01/16
 * Time: 15:25
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Presence extends Model
{
    protected $table = 'presences';
    protected $primaryKey = 'id';

    protected $fillable = [
        'pertemuan_ke',
        'kode_seksi',
        'tanggal',
        'Noreg',
        'Kehadiran'
    ];

    public static function getKodeWaktuByDate($date){
        $instance = DB::select('SELECT time(tanggal) as time FROM presences WHERE date(tanggal)=?',[$date]);
        if(count($instance)==0)
            return null;
        $time = $instance[0]->time;
        //next query timeslot, guaranteed to be not null by condition
        $timeslot = WaktuKuliah::getKodeWaktuByTime($time);
        return $timeslot;
    }
}