<?php

namespace App;

use App\Models\Presence;
use App\Models\WaktuKuliah;
use Illuminate\Support\Facades\DB;

class Helpers
{

    public static function indonesian_date($timestamp = '', $date_format = 'l, j F Y', $suffix = 'Pukul')
    {
        if (trim($timestamp) == '') {
            $timestamp = time();
        } elseif (!ctype_digit($timestamp)) {
            $timestamp = strtotime($timestamp);
        }
        # remove S (st,nd,rd,th) there are no such things in indonesia :p
        $date_format = preg_replace("/S/", "", $date_format);
        $pattern = array(
            '/Mon[^day]/', '/Tue[^sday]/', '/Wed[^nesday]/', '/Thu[^rsday]/',
            '/Fri[^day]/', '/Sat[^urday]/', '/Sun[^day]/', '/Monday/', '/Tuesday/',
            '/Wednesday/', '/Thursday/', '/Friday/', '/Saturday/', '/Sunday/',
            '/Jan[^uary]/', '/Feb[^ruary]/', '/Mar[^ch]/', '/Apr[^il]/', '/May/',
            '/Jun[^e]/', '/Jul[^y]/', '/Aug[^ust]/', '/Sep[^tember]/', '/Oct[^ober]/',
            '/Nov[^ember]/', '/Dec[^ember]/', '/January/', '/February/', '/March/',
            '/April/', '/June/', '/July/', '/August/', '/September/', '/October/',
            '/November/', '/December/',
        );
        $replace = array('Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min',
            'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu',
            'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des',
            'Januari', 'Februari', 'Maret', 'April', 'Juni', 'Juli', 'Agustus', 'September',
            'Oktober', 'November', 'Desember',
        );
        $date = date($date_format, $timestamp);
        $date = preg_replace($pattern, $replace, $date);
        $date = "{$date} {$suffix}";
        return $date;
    }

    /**
     * Transform instances of eloquentModel to instances of associative array
     */
    public static function toAssociativeArrays($instances)
    {
        $array = array();
        if(empty($instances))
            return array();
        foreach ($instances as $instance) {
            $instance_arr = (array)$instance;
            $vals = array_values($instance_arr);
            $array[$vals[0]] = $vals[1];
        }
        return $array;
    }

    public static function modelAsAssociativeArray($model, $fieldname1, $fieldname2){
        $array = array();
        foreach($model as $instance){
            $val1=$instance->$fieldname1;
            $val2=$instance->$fieldname2;
            $array[$val1]=$val2;
        }
        return $array;
    }

    public static function toFullAssociativeArrays($instances)
    {
        $array = array();
        foreach ($instances as $instance) {
            $instance_arr = (array)$instance;
            $vals = array_values($instance_arr);
            $array[$vals[0]] = $vals;
        }
        return $array;
    }

    /**
     * @param $day string of course day
     * @param $time_start string of course start time
     * @param $time_end string of course end time
     */
    public static function isAbsentFillable($day, $time_start, $time_end, $kode_seksi, $noreg)
    {
        //get current time in Indonesia
        $current_day = trans('messages.' . date('l'));
        //get current time
        $current_time = date('H:i');
        //first condition current time must be in interval course time
        $stat = (boolean)DB::select('select ? between ? and ? as result', [$current_time, $time_start, $time_end])[0]->result;
        //second condition current day must be within course day
        $stat2 = strcmp($current_day, $day) == 0;
        //third condition, check in presences table whether current slot already exist
        $current_slot = WaktuKuliah::getKodeWaktuByTime($current_time);
        if(is_null($current_slot))
            return 0;
        $current_date = date('Y-m-d');
        $recorded_slot = Presence::getKodeWaktuByDate($current_date,$kode_seksi,$noreg);
        //if(is_null($recorded_slot))
        //    return 0;
        //insertable if current slot different from recorded slot
        $stat3 = strcmp($current_slot, $recorded_slot) <> 0;
        $final_stat = $stat && $stat2 && $stat3;
        return $final_stat;
    }

    /**
     * Todo: Not a generic class but specific to certain condition will be move later to its proper place
     * @param $presences
     * @return array
     */
    public static function arrayMap($presences){
        //first generate empty array of 16 counter
        $counter_pertemuan=array();
        for($i=1;$i<=16;$i++){
            $counter_pertemuan[$i]=0;
        }

        foreach($presences as $presence){
            $counter_pertemuan[$presence->pertemuan_ke]=1;
        }
        return $counter_pertemuan;
    }
}