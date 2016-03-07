<?php

namespace App\HTTP\Traits;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RedirectsUsers;

trait RegistersUsers
{
    use RedirectsUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRegister()
    {
        return view('auth.register');
    }

    public function getAdminRegister()
    {
        return view('auth.register_admin');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function postRegister(Request $request)
    {
        //validator function is implemented in AuthController
        $validator = $this->account_validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        //we do not want to login directly but bring it to the new page
        $registration_data = $request->all();
        //turn off user creation at this state, we only wanted to create user once in final stage of form wizard submission
        //Auth::login($this->create($request->all()));
        //return redirect($this->redirectPath());

        $path = 'auth/register';
        $role=$registration_data['role'];
        $registration_data = json_encode($registration_data);
        //fill path with some value so we knew next page is coming from this place
        $data = array('path' => $path, 'reg_data' => $registration_data);
        if (strcmp($role, 'student') == 0) {
            //TODO obfuscating passing parameter, at the moment plain text being passed
            //We can implement crypto here
            return redirect()->action('Auth\AuthController@getStudentRegistrationForm', $data);
        } else { //then the role is dosen
            return redirect()->action('Auth\AuthController@getDosenRegistrationForm', $data);
        }
    }

    public function postAdminRegister(Request $request)
    {
        //validator function is implemented in AuthController
        $validator = $this->account_validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        //we do not want to login directly but bring it to the new page
        $registration_data = $request->all();
        //turn off user creation at this state, we only wanted to create user once in final stage of form wizard submission
        //Auth::login($this->create($request->all()));
        //return redirect($this->redirectPath());

        $path = 'auth/register_admin';
        //fill path with some value so we knew next page is coming from this place
        $data = array('path' => $path, 'reg_data' => $registration_data);
        return redirect()->action('Auth\AuthAdminController@getAdminRegistrationForm', $data);



    }
}


