<?php
/**
 * Created by PhpStorm.
 * User: eka
 * Date: 14/01/17
 * Time: 17:39
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $table='kalender_akademik';
    protected $primaryKey = 'id';

    protected $fillable = [
        'semester',
        'start_period',
        'end_period',
        'active'
    ];
}