<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/* default by laravel
Route::get('/',function()
{
            return view('home');
});
*/

/*routes of older system*/


//Route::get('absence', 'AbsenceController@index');
//Route::get('absence/tambah', 'AbsenceController@tambah');
//Route::post('absence', 'AbsenceController@simpan');


//new routes for absen v2 here:
Route::get('/', 'HomeController@home');
Route::get ('/home','HomeController@home');
Route::get ('/profildosen',function(){
    return view('lecturers/profildosen');
});
Route::get ('/profiladmin',function(){
    return view('admin/profiladmin');

});
Route::get ('/coursetopic',function(){
    return view('lecturers/coursetopic');

});
Route::get ('/rekapdosen',function(){
    return view('lecturers/rekap');

});
Route::get ('/rekapadmin',function(){
    return view('admin/rekap');

});
Route::get ('/crudjadwal',function(){
    return view('admin/crudjadwal');

});
Route::get ('/enrollmhs',function(){
    return view('students/enroll');

});
Route::get ('/inputabsen',function(){
    return view('students/inputabsen');

});
Route::get ('/showadmin',function(){
    return view('admin/showadmin');

});
Route::get ('/createcourse',function(){
    return view('lecturers/createcourse');

});
//authentication routes
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
//registration routes
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::controllers([
    'password' => 'Auth\PasswordController',
]);

Route::get('profil', 'StudentController@profil');
//forgot password
Route::get('auth/password/email', 'Auth\PasswordController@getEmail');
Route::post('auth/password/email', 'Auth\PasswordController@postEmail');
//reset password
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');