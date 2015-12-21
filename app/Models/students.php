<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class students extends Model
{
     protected $fillable =[

        'Noreg',
        'Nama_Mhs',
        'Prodi',
        'Alamat',
        'Telepon',
		'Semester'
    ];
}
