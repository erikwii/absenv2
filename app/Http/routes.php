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

/***********************************************************/
//new routes for absen v2 here:
/**********************************************************/

//route for home
Route::get('/', 'HomeController@home');
Route::get ('/home','HomeController@home');

//route for student's profile
Route::get('/profil', 'StudentController@profil');
Route::post('/profil', 'StudentController@updateprofil');
//route for dosen's profile
Route::get ('/profildosen','LecturerController@profildosen');
Route::post ('/profildosen','LecturerController@updateProfilDosen');
//route for admin's profile
Route::get ('/profiladmin', 'AdminController@profiladmin');

//route for topik dosen
Route::get ('/coursetopic/tambahtopik', 'TopicController@tambahtopik');
Route::post('/coursetopic/tambahtopik', 'TopicController@simpantopik');
Route::get ('/coursetopic', 'TopicController@showTopic');
Route::post('/coursetopic', 'TopicController@showTopicFiltered');
Route::get ('/coursetopic/{id_course}', 'TopicController@editTopic');
Route::post('/coursetopic/{id_course}', 'TopicController@updateTopic');

Route::get('/notopic',function(){
    return view('lecturers.notopic');
});

//route for rekap dosen
Route::get ('/rekapdosen', 'LecturerController@rekapDosen');
Route::post ('/rekapdosen', 'LecturerController@postRekapDosen');
Route::post ('/ajaxrekapdosen', 'LecturerController@AjaxReloadRekapDosenWithSemester');
//route for rekap admin
Route::get ('/rekapadmin', 'AdminController@rekapadmin');
//route for crudjadwal for admin
Route::get ('/crudjadwal', 'AdminController@crudjadwal');
//route for add course for mahasiswa
Route::get ('/enrollmhs', 'StudentController@enrollmhs');
Route::post ('/enrollmhs', 'StudentController@saveenrollment');
Route::get ('/student/viewcourse', 'MatkulController@viewCourseByProdi');

//Route::get ('/enrollmhs/{id_pertemuan}/{id_seksi}/{noreg}', 'StudentController@saveabsen');
//route for input absen mahasiswa
Route::get ('/inputabsen','StudentController@inputabsen');
Route::post ('/inputabsen','StudentController@saveabsen');
//route for show all presences for admin
Route::get ('/showadmin', 'AdminController@showadmin');
//route for create new course dosen
Route::get ('/createcourse/tambahMatkul', 'MatkulController@createMatkul');
Route::post('/createcourse/tambahMatkul', 'MatkulController@saveMatkul');
Route::get ('/createcourse/tambahMatkul/{id_matkul}', 'MatkulController@editMatkul');
Route::post('/createcourse/tambahMatkul/{id_matkul}', 'MatkulController@updateMatkul');
Route::get ('/showcourse', 'MatkulController@viewCourseByLecturer');
//route for lihatabsen mhs for mahasiswa
Route::get ('/lihatabsen', 'StudentController@lihatabsen');
//route for add and delete user for admin
Route::get ('/updateuser', 'AdminController@updateuser');

//authentication routes
Route::get('/auth/login', 'Auth\AuthController@getLogin');
Route::post('/auth/login', 'Auth\AuthController@authenticate');
Route::get('/auth/logout', 'Auth\AuthController@getLogout');
//registration routes
Route::get('/auth/register', 'Auth\AuthController@getRegister');
Route::post('/auth/register', 'Auth\AuthController@postRegister');
Route::get('/auth/register_admin', 'Auth\AuthAdminController@getAdminRegister');
Route::post('/auth/register_admin', 'Auth\AuthAdminController@postAdminRegister');

//route for student registration
Route::get('/auth/student_registration','Auth\AuthController@getStudentRegistrationForm');
Route::post('/auth/student_registration', 'Auth\AuthController@postStudentRegistration');
//route for dosen registration
Route::get('/auth/dosen_registration','Auth\AuthController@getDosenRegistrationForm');
Route::post('/auth/dosen_registration','Auth\AuthController@postDosenRegistration');

Route::controllers([
    'password' => 'Auth\PasswordController',
]);

//route for admin registration
Route::get('/auth/admin_registration','Auth\AuthAdminController@getAdminRegistrationForm');
Route::post('/auth/admin_registration','Auth\AuthAdminController@postAdminRegistration');


//forgot password
Route::get('/auth/password/email', 'Auth\PasswordController@getEmail');
Route::post('/auth/password/email', 'Auth\PasswordController@postEmail');
//reset password
Route::get('/password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('/password/reset', 'Auth\PasswordController@postReset');