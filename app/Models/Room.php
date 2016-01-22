<?php
/**
 * Created by PhpStorm.
 * User: eka
 * Date: 22/01/16
 * Time: 15:24
 */

namespace app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Room extends Model
{
    protected $table = 'rooms';

    /**
     * The database table primary key.
     *
     * @var string
     */
    protected $primaryKey = 'id_ruang';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama_ruang',
        'lokasi'
    ];

    public static function room_name(){
        $room = DB::table('rooms')
            ->select('id_ruang','nama_ruang')
            ->get();
        return $room;
    }
}