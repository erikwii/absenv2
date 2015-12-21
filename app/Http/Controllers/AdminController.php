<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use App\Models\admins;
use App\Http\Requests;
//use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
class AdminController extends Controller
{ public function profiladmin(){
    return view('admin.profiladmin');
    }
    public function rekapadmin(){
        return view('admin.rekap');
    }

    public function showadmin(){
        return view('admin.showadmin');
    }

    public function crudjadwal(){
        return view('admin.crudjadwal');
    }
    public function updateuser(){
        return view('admin.updateuser');
    }

}
