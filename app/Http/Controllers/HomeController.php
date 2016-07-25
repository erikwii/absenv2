<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Must add additional check, if user is authenticated bring him to each respective profil page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function home(Request $request)
    {
        //get role of current user
        $role=$request->session()->get('role');

        /*switch($role){
            case "student":
                return redirect()->action('StudentController@profil');
                break;
            case "dosen":
                return redirect()->action('LecturerController@profildosen');
                break;
            case "admin":
                return redirect()->action('AdminController@profiladmin');
                break;
            default:
                return view('home');*/
//diubah
        switch($role){
            case "admin":
                return redirect()->action('AdminController@profiladmin');
                break;
            case "student":
                return redirect()->action('StudentController@profil');
                break;
            case "dosen":
                return redirect()->action('LecturerController@profildosen');
                break;
            default:
                return view('home');
        }
    }
}
