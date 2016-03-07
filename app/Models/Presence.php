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

    /**
     * Get the time element from datetime parameter, then get kode_waktu from fetched time, based on Noreg and Kode Seksi
     * @param $date
     * @return mixed|null
     */
    public static function getKodeWaktuByDate($date, $kode_seksi, $noreg){
        $instance = DB::select('SELECT time(tanggal) as time FROM presences WHERE date(tanggal)=? and kode_seksi=? and Noreg=? order by time desc',[$date, $kode_seksi, $noreg]);
        if(count($instance)==0)
            return null;
        $time = $instance[0]->time;
        //next query timeslot, guaranteed to be not null by condition
        $timeslot = WaktuKuliah::getKodeWaktuByTime($time);
        return $timeslot;
    }

    //check if this composite key already exist
    public static function isExist($pertemuan, $kode_seksi){
        $count = DB::table('presences')
            ->where('pertemuan_ke', $pertemuan)
            ->where('kode_seksi', $kode_seksi)
            ->count('*');
        if($count==1)
            return true;
        return false;
    }

    public static function countPresenceeBySectionNoreg($seksi,$noreg){
        $count = DB::table('presences')
            ->where('kode_seksi', $seksi)
            ->where('Noreg',$noreg)
            ->count('*');
        return $count;
    }
}