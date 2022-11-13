<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentRegistrationController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AdminController;


 

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

Route::get('/', function () {
    return view('Home.Index');
});
//Route::get('/', 'App\Http\Controllers\HomeController@Index');
Route::get('/Home', 'App\Http\Controllers\HomeController@Index');
//Route::get('/Registration', 'App\Http\Controllers\StudentRegistrationController@create');
//Route::POST('/addStudent', 'App\Http\Controllers\StudentRegistrationController@store');


// Route::get('/', [HomeController::class, 'Index']);
// Route::get('/Home', [HomeController::class, 'Index']);
Route::get('/Registration', [StudentRegistrationController::class, 'create']);


Route::POST('/addStudent', [StudentRegistrationController::class, 'store']);
Route::POST('/LoginSubmit', [StudentRegistrationController::class, 'LoginSubmit']);

Route::POST('/destroy', [StudentRegistrationController::class, 'destroy']);
Route::POST('/ProfileCall', [StudentRegistrationController::class, 'ProfileCall']);
Route::POST('/SearchBy', [StudentRegistrationController::class, 'showSearchList']);

//User profile show
// Route::get('/')

//Route::post('payment-gateway','App\Http\Controllers\PaymentGatewayController@initiatePayment');
//Route::get('/success-url', [StudentRegistrationController::class, 'verifyPayment']);
Route::get('success-url','App\Http\Controllers\StudentRegistrationController@verifyPayment');
Route::POST('/updateStudent', [StudentRegistrationController::class, 'edit']);
//***
//Teacher Registration
Route::get('/teacher-registration', [TeacherController::class, 'create_form'])->name('teacher_form');
Route::post('/confirm-registration', [TeacherController::class, 'teacher_create'])->name('teacher_create');

//success page for teacher
Route::get('/registration-confirmation', [TeacherController::class, 'success_message'])->name('success_message');

//Admin Dashboard view
Route::get('/Dashboard', [AdminController::class, 'dashboard_index'])->name('dashboard_index');
//Student registration report
Route::get('/Registration-report', [AdminController::class, 'registration_report'])->name('registration_report');
//Edit registered student
Route::get('/registered-student-edit/{id}', [AdminController::class, 'student_edit'])->name('student_edit');
//Student detail for making BR
Route::get('/registered-student-detail-for-BR', [AdminController::class, 'student_detail'])->name('student_detail');
//Edit br status
Route::get('/edit-br-status/{id}', [AdminController::class, 'edit_br_status'])->name('edit_br_status');
//update status
Route::post('/br-status-update',[AdminController::class, 'br_status_update'])->name('br_status_update');
//Edit registered student
Route::get('/registered-student-edit/{id}', [AdminController::class, 'student_edit'])->name('student_edit');
//Br List
Route::get('/Br-List', [StudentRegistrationController::class, 'br_list'])->name('br_list');
//Member list view
Route::get('Member-List', [StudentRegistrationController::class, 'member_list'])->name('member_list');


Route::get('/Member-login', [StudentRegistrationController::class, 'Login'])->name('member_login');

//User check
Route::post('/login/check', [StudentRegistrationController::class, 'user_check'])->name('user_check');
Route::get('/auth/logout', [StudentRegistrationController::class, 'user_logout'])->name('user_logout');
Route::group(['middleware' =>['AuthCheck']], function(){
    Route::get('/user-dashboard', [StudentRegistrationController::class, 'user_dashboard'])->name('user_dashboard');
    //BR panel
    Route::get('/BR-panel', [StudentRegistrationController::class, 'br_panel'])->name('br_panel');

});





Route::get('/Admin', [StudentRegistrationController::class, 'Admin']);
Route::POST('/AdminSubmit', [StudentRegistrationController::class, 'AdminSubmit']);

Route::get('/ForgotPasswordView', [StudentRegistrationController::class, 'ForgotPasswordView']);
Route::POST('/ForgotPassword', [StudentRegistrationController::class, 'ForgotPassword']);

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');