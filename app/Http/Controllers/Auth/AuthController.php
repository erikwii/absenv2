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
use App\Models\Users;
use App\Models\Prodi;

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
    private $maxLoginAttempts = 7;

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
            'Noreg' => 'required|unique:students|max:13',
            'nama' => 'required|max:255',
            'semester' => 'required|numeric',
        ]);
    }

    /**
     * Get a validator for an incoming dosen registration request.
     * Todo: bug in kode_dosen validator
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function dosen_validator(array $data)
    {
        return Validator::make($data, [
            'Kode_Dosen' => 'required|unique:lecturers|min:4',
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

        $this->validate($request, [
            $this->loginUsername() => 'required', 'password' => 'required',
        ]);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        $throttles = $this->isUsingThrottlesLoginsTrait();
        if ($throttles && $this->hasTooManyLoginAttempts($request)) {
            return $this->sendLockoutResponse($request);
        }

        if (Auth::attempt(['email' => $email, 'password' => $password, 'role' => $role],$request->has('remember'))) {
            if(strcmp($role,'student')==0) {
                $this->redirectTo = "profil";
                //return redirect()->action('StudentController@profil');
            }
            else if(strcmp($role,'dosen')==0) {
                $this->redirectTo="profildosen";
                //return redirect()->action('LecturerController@profildosen');
            }
            else{
                $this->redirectTo="profiladmin";
            }
            $request->session()->put("role",$role);
            return $this->handleUserWasAuthenticated($request, $throttles);
        }
        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        if ($throttles) {
            $this->incrementLoginAttempts($request);
        }

        return redirect($this->loginPath())
            ->withInput($request->only($this->loginUsername(), 'remember'))
            ->withErrors([
                $this->loginUsername() => $this->getFailedLoginMessage(),
            ]);
    }

    /**
     * Log the user out of the application.
     * Override default function from TraitAuthenticateUsers
     * @return \Illuminate\Http\Response
     */
    public function getLogout(Request $request)
    {
        $request->session()->forget('role');
        Auth::logout();
        return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/');
    }

    /**
     * dosenRegistrationForm preparation
     * @param Request $request
     */
    public function getDosenRegistrationForm(Request $request){
        if(!$request->has('path'))
            return view('auth.register'); //return to registration form
        $reg_data=json_decode($request->input('reg_data'),true);
        //store reg_data as session
        $request->session()->put('reg_data',$reg_data);
        $reg_name = '\''.$reg_data['name'].'\'';
        return view('auth.dosen_registration',['reg_name'=>$reg_name]);
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
        $reg_data=json_decode($request->input('reg_data'),true);
        //store reg_data as session
        $request->session()->put('reg_data',$reg_data);
        //pass along all prodi name
        $prodis = Prodi::all();
        //transform prodi model to associative array;
        $prodi_arr=array();
        foreach($prodis as $prodi){
            $prodi_arr[$prodi->id]=$prodi->prodi;
        }
        $reg_name = '\''.$reg_data['name'].'\'';
        return view('auth.student_registration', ['reg_name'=>$reg_name,'prodis'=>$prodi_arr]);
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
        //get id first
        $id=Users::getNextId('users');

        //1. create new users instance & authenticate the user
        $reg_data = $request->session()->get('reg_data');
        Auth::login($this->create($reg_data));
        //after creation remove the session
        $request->session()->forget('reg_data');
        //2. create new students instance, not extra parameter
        $student = new Student;
        $student->Noreg=$request['Noreg'];
        $student->Nama_Mhs =$request['nama'];
        $student->Prodi_Id =$request['Prodi_Id'];
        $student->Alamat=$request['alamat'];
        $student->Telepon=$request['telepon'];
        $student->Semester=$request['semester'];
        $student->Mac=$request['Mac'];
        $student->id_user=$id;
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

        //get id user
        $id=Users::getNextId('users');

        //1. create new users instance & authenticate the user
        $reg_data = $request->session()->get('reg_data');
        Auth::login($this->create($reg_data));
        //after creation remove the session
        $request->session()->forget('reg_data');
        //2. create new lecturer instance, not extra parameter
        $lecturer = new Lecturer;
        $lecturer->Kode_Dosen=$request['Kode_Dosen'];
        $lecturer->Nama_Dosen =$request['nama'];
        $lecturer->Telepon=$request['telepon'];
        $lecturer->id_user=$id;
        $lecturer->save();
        //3. redirect to profile page
        return redirect()->action('LecturerController@profildosen');
    }
}
