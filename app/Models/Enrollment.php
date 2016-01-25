<?php
/**
 * Created by PhpStorm.
 * User: eka
 * Date: 25/01/16
 * Time: 11:43
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    protected $table='enrollments';
    protected $primaryKey = 'id';

    protected $fillable = [
        'kode_seksi',
        'noreg'
    ];
}