<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $admin = $user->admin;
        return view('admin.profiladmin', ['admin' => $admin]);
    }

    public function updateProfilAdmin(Request $request){
        $input = $request->all();
        $admin = Admin::find($input['id']);
        $admin->Nama_Admin = $input['Nama_Admin'];
        $admin->Alamat = $input['Alamat'];
        $admin->Telepon = $input['Telepon'];
        $admin->save();
        return $this->profiladmin();
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

    //Todo: Implement pagination
    public function viewuser()
    {
        //get all user instance
        $users = User::all();
        return view('admin.viewuser')->with('users',$users);
    }

    //Todo: Finishing implementation for edit user
    public function editUser($id){
        return view('admin.viewuser');
    }

    //Todo: Finishing implementation for delete user
    public function deleteUser($id){
        return view('admin.viewuser');
    }
}
