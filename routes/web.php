<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentRegistrationController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\DB;


 

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
    $result = DB::select(DB::raw("SELECT DISTINCT Batch,count(*) as Total from students where students.status = 1 group by Batch desc limit 5"));
        $data = "";
        foreach($result as $val){
            
            $data.= "[".$val->Batch.",".$val->Total."],";
        }
    // dd($data);
    return view('Home.Index',compact('data'));
});
Route::get('/line-chart', [StudentRegistrationController::class, 'line_chart']);
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
//Teacher Registration form view
Route::get('/teacher-registration', [TeacherController::class, 'create_form'])->name('teacher_form');
//teacher registration form submit
Route::post('/confirm-registration', [TeacherController::class, 'teacher_create'])->name('teacher_create');


//success page for teacher
Route::get('/registration-confirmation', [TeacherController::class, 'success_message'])->name('success_message');
//Teacher public view
Route::get('/public/teacher/view', [TeacherController::class, 'public_teacher'])->name('public_teacher');

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



Route::get('/Member-login', [StudentRegistrationController::class, 'Login'])->name('member_login');

//User check
Route::post('/login/check', [StudentRegistrationController::class, 'user_check'])->name('user_check');
Route::get('/auth/logout', [StudentRegistrationController::class, 'user_logout'])->name('user_logout');
Route::group(['middleware' =>['AuthCheck']], function(){
    Route::get('/user-dashboard', [StudentRegistrationController::class, 'user_dashboard'])->name('user_dashboard');
    //BR panel
    Route::get('/BR-panel', [StudentRegistrationController::class, 'br_panel'])->name('br_panel');
    //Br list view
    Route::get('/Br-List', [StudentRegistrationController::class, 'br_list'])->name('br_list');
    //Member list view
    Route::get('Member-List', [StudentRegistrationController::class, 'member_list'])->name('member_list');
    //Batchmates view
    Route::get('/batchmates', [StudentRegistrationController::class, 'batchmates'])->name('batchmates');

});

//Public BR List
Route::get('/public/BR', [StudentRegistrationController::class, 'public_br'])->name('public_br');


//Public Admin&Modetarator List
Route::get('/public/admin', [StudentRegistrationController::class, 'public_admin'])->name('public_admin');





Route::get('/Admin', [StudentRegistrationController::class, 'Admin']);
Route::POST('/AdminSubmit', [StudentRegistrationController::class, 'AdminSubmit']);

Route::get('/ForgotPasswordView', [StudentRegistrationController::class, 'ForgotPasswordView']);
Route::POST('/ForgotPassword', [StudentRegistrationController::class, 'ForgotPassword']);

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
