<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
        $users = DB::table('users')->paginate(20);
        return view('admin.viewuser')->with('users',$users);
    }

    //Todo: Finishing implementation for edit user
    public function editUser(Request $request){
        $validator = $this->account_validator($request->all());
        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        //get old_password field
        $user = Auth::user();
        $user->name=$request['name'];
        $user->email=$request['email'];
        $user->password=Hash::make($request['password']);
        $user->save();
        return $this->viewuser();
    }

    //Todo: Finishing implementation for delete user
    public function deleteUser($id){
        return view('admin.viewuser');
    }

    protected function account_validator(array $data)
    {
        $validator = Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed|min:6',
        ]);

        /*$func = function($validator) {
            //but we can debug if anonymous function calls another function
            if ($this->check_password($validator)) {
                $validator->errors()->add('field', 'Old password do not match database record!');
            }
        };
        $validator->after($func);
        */
        return $validator;
    }

    /**
     * Unused now, previously used to reset password in admin by verifying password but wrong business case
     * @param $validator
     * @return bool
     */
    protected function check_password($validator){
        //get current user id
        $user = Auth::user();
        $old_password = $validator->getData()['old_password'];
        $db_password = $user->password;
        if(Hash::check($old_password,$db_password))
            return false;
        return true;
    }
}
