<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use App\Models\Admin;
use App\Http\Requests;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function __construct()
    {
        //attach auth middleware, if user not authenticated forward to login page
        //$this->middleware('auth');
    }

    public function profiladmin()
    {
        $user = Auth::user();
        //$user_data = $request->user();
        $name = $user['attributes']['name'];
        $admins = Admin::where('Nama_Admin', $name)->take(1)->get();
        //$student
        $Id_Admin = $admins[0]['attributes']['Id_Admin'];
        return view('admin.profiladmin', ['name' => $name, 'Id_Admin' => $Id_Admin]);
    }

    public function rekapadmin()
    {
        return view('admin.rekap');
    }

    public function showadmin()
    {
        return view('admin.showadmin');
    }

    public function crudjadwal()
    {
        return view('admin.crudjadwal');
    }

    public function updateuser()
    {
        return view('admin.updateuser');
    }

}
