<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use App\Http\Traits\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use App\Models\Lecturer;

class AuthController extends Controller
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

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;
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
     * @param  array  $data
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
     * Get a validator for an incoming student registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function student_validator(array $data)
    {
        return Validator::make($data, [
            'noreg' => 'required|unique:students|max:255',
            'nama' => 'required|max:255',
            'prodi' => 'required|min:6',
            'semester' => 'required|numeric',
        ]);
    }

    /**
     * Get a validator for an incoming dosen registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function dosen_validator(array $data)
    {
        return Validator::make($data, [
            'kode_dosen' => 'required|unique:lecturers|max:255',
            'nama' => 'required|max:255',
            'telepon' => 'numeric',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'role' => $data['role'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    /**
     * Custom authentication since we have extra field, info
     * @param Request $request
     */
    public function authenticate(Request $request){
        $email=$request['email'];
        $password=$request['password'];
        $role=$request['role'];
        if (Auth::attempt(['email' => $email, 'password' => $password, 'role' => $role])) {
            if(strcmp($role,'student')==0)
                return redirect()->action('StudentController@profil');
            else
                return redirect()->action('LecturerController@profildosen');
        }
    }

    /**
     * dosenRegistrationForm preparation
     * @param Request $request
     */
    public function getDosenRegistrationForm(Request $request){
        if(!$request->has('path'))
            return view('auth.register'); //return to registration form
        $reg_data=$request->input('reg_data');
        //store reg_data as session
        $request->session()->put('reg_data',$reg_data);
        return view('auth.dosen_registration',['reg_name'=>$reg_data['name']]);
    }

    /**
     * The reason we choose to implement this function in AuthController instead as trait is
     * for the functionality to work it needs to store a global variable in this class therefore, not suitable as trait
     */
    public function getStudentRegistrationForm(Request $request){
        //return view with extra parameter
        //check path if path not from auth/register forward to the page
        if(!$request->has('path'))
            return view('auth.register'); //return to registration form
        //else meaning it must has stored register data, global object within this class
        $reg_data=$request->input('reg_data');
        //store reg_data as session
        $request->session()->put('reg_data',$reg_data);
        return view('auth.student_registration', ['reg_name'=>$reg_data['name']]);
    }

    /**
     * Create user account, and student account then immediately authenticate to bring to profile page
     * @param Request $request, implicitly passed
    */
    public function postStudentRegistration(Request $request){
        $validator = $this->student_validator($request->all());
        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        //1. create new users instance & authenticate the user
        $reg_data = $request->session()->get('reg_data');
        Auth::login($this->create($reg_data));
        //after creation remove the session
        $request->session()->forget('reg_data');
        //2. create new students instance, not extra parameter
        $student = new Student;
        $student->Noreg=$request['noreg'];
        $student->Nama_Mhs =$request['nama'];
        $student->Prodi =$request['prodi'];
        $student->Alamat=$request['alamat'];
        $student->Telepon=$request['telepon'];
        $student->Semester=$request['semester'];
        $student->save();
        //3.forward the user into profile page, redirectPath() return $redirectTo
        return redirect()->action('StudentController@profil');
    }

    /**
     * Create user account, dosen account, then authenticate the user, redirect to profile page
     */
    public function postDosenRegistration(Request $request){
        $validator = $this->dosen_validator($request->all());
        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        //1. create new users instance & authenticate the user
        $reg_data = $request->session()->get('reg_data');
        Auth::login($this->create($reg_data));
        //after creation remove the session
        $request->session()->forget('reg_data');
        //2. create new lecturer instance, not extra parameter
        $lecturer = new Lecturer;
        $lecturer->Kode_Dosen=$request['kode_dosen'];
        $lecturer->Nama_Dosen =$request['nama'];
        $lecturer->Telepon=$request['telepon'];
        $lecturer->save();
        //3. redirect to profile page
        return redirect()->action('LecturerController@profildosen');
    }
}
