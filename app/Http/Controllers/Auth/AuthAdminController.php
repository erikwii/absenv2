<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use App\Http\Traits\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Users;

class AuthAdminController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers;
    protected $redirectTo = 'profil';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function account_validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Get a validator for an incoming admin registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function admin_validator(array $data)
    {
        return Validator::make($data, [
            'Nama_Admin' => 'required|max:255',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role' => $data['role']
        ]);
    }

    /**
     * Custom authentication since we have extra field, info
     * @param Request $request
     */
    public function authenticate(Request $request)
    {
        $email = $request['email'];
        $password = $request['password'];
        return redirect()->action('AdminController@profiladmin');
    }

    public function getAdminRegistrationForm(Request $request)
    {
        if (!$request->has('path'))
            return view('auth.register_admin'); //return to registration form
        $reg_data = $request->input('reg_data');
        //store reg_data as session
        $request->session()->put('reg_data', $reg_data);
        return view('auth.admin_registration', ['reg_name' => $reg_data['name']]);
    }

    /**
     * Create user account, admin account, then authenticate the user, redirect to profile page
     */
    public function postAdminRegistration(Request $request)
    {
        $validator = $this->admin_validator($request->all());
        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $id=Users::getNextId('users');
        //1. create new users instance & authenticate the user
        $reg_data = $request->session()->get('reg_data');
        Auth::login($this->create($reg_data));
        //after creation remove the session
        $request->session()->forget('reg_data');
        //2. create new lecturer instance, not extra parameter
        $admin = new Admin;
        $admin->Nama_Admin = $request['Nama_Admin'];
        $admin->Alamat = $request['Alamat'];
        $admin->Telepon = $request['Telepon'];
        $admin->id_user = $id;
        $admin->save();
        //3. redirect to profile page
        return redirect()->action('AdminController@profiladmin');
    }

}