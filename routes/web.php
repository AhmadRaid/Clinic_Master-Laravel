<?php


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware' => 'auth'], function() {
Route::get('logout', 'LoginController@logout')->name('logout');
Route::get('/', 'LoginController@index')->name('home');
Route::get('index', 'LoginController@index')->name('index');
Route::get('patient/add', 'UsersController@addpatient');
Route::post('patient/add', 'UsersController@createpatient');
Route::resource('users', 'UsersController');
Route::delete('users/destroy/all','UsersController@multi_delete');
Route::get('body/add', 'UsersController@addbody');
Route::post('body/add', 'UsersController@createbody');
Route::get('physical/add', 'UsersController@addphysical');
Route::post('physical/add', 'UsersController@createphysical');
Route::get('heightweight/add', 'UsersController@addheightweight');
Route::post('heightweight/add', 'UsersController@createheightweight');
Route::get('user/patient', 'UsersController@patient');

Route::get('body/add/{id}', 'UsersController@addbody');
Route::get('physical/add/{id}', 'UsersController@addphysical');
Route::get('heightweight/add/{id}', 'UsersController@addheightweight');




Route::resource('department', 'DepartmentController');
Route::delete('department/destroy/all','UsersController@multi_delete');

Route::resource('service', 'ServiceController');
Route::delete('service/destroy/all','UsersController@multi_delete');

Route::resource('booking', 'BookingController');
Route::delete('booking/destroy/all','UsersController@multi_delete');

Route::resource('doctor', 'DoctorController');
Route::delete('doctor/destroy/all','UsersController@multi_delete');

Route::resource('patientreports', 'PatientReportController');
Route::post('patient/booking', 'PatientReportController@getAppointment')->name('get-appointment');

Route::resource('patient', 'PatientController');
Route::delete('patient/destroy/all','UsersController@multi_delete');

Route::get('/service/{id}/{typea}', 'ServiceController@typea')->name('typea');
Route::get('users/{id}/show', 'UsersController@profile');
Route::get('search/patient', 'UsersController@search');

Route::get('FinancialDaily','Financialreports@financialdaily');
Route::get('FinancialMonthly','Financialreports@financialmonthly');
Route::get('FinancialYearly','Financialreports@financialYearly');


Route::resource('foodsystem', 'FoodsystemController');
Route::delete('foodsystem/destroy/all','FoodsystemController@multi_delete');




Route::resource('medicine', 'MedicineController');
Route::delete('MedicineController/destroy/all','MedicineController@multi_delete');
});

Route::group(['middleware' => 'guest'], function() {
    Route::post('login', 'LoginController@adminLogin')->name('admin.post.login');
    Route::get('login', 'LoginController@login')->name('login');
});

Route::get('lang/{lang}', function ($lang) {

    session()->has('lang')? session()->forget('lang'):'';

    $lang == 'ar' ?session()->put('lang','ar'):session()->put('lang','en');

    return back();

    });


