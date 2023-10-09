<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\AcademicSessionController;
use App\Http\Controllers\AcademicClassController;
use App\Http\Controllers\RoleController;

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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', [UserController::class, 'login'])->name('');

//Route::get('/login', [UserController::class, 'login'])->name('login');
//Route::post('/login-post', [UserController::class, 'loginPost'])->name('login-post');
Route::get('/', [UserController::class, 'login'])->name('');

Route::group(['prefix' => 'admin'], function () {

    // login
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/login-post', [UserController::class, 'loginPost'])->name('login-post');
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');

    Route::group(['middleware' => ['auth']], function () {

        // START - user
        Route::get('/add-super-admin', [UserController::class, 'addSuperAdmin'])->name('add-super-admin');
        Route::post('/store-super-admin', [UserController::class, 'storeSuperAdmin'])->name('store-super-admin');
        Route::get('/super-admin-list', [UserController::class, 'superAdminList'])->name('super-admin-list');
        Route::get('/edit-super-admin/{id}', [UserController::class, 'editSuperAdmin'])->name('edit-super-admin');
        Route::post('/update-super-admin/{id}', [UserController::class, 'updateSuperAdmin'])->name('update-super-admin');
        Route::get('/delete-super-admin/{id}', [UserController::class, 'deleteSuperAdmin'])->name('delete-super-admin');
        // START - school
        Route::get('/add-school', [SchoolController::class, 'addSchool'])->name('add-school');
        Route::post('/store-school', [SchoolController::class, 'storeSchool'])->name('store-school');
        Route::get('/school-list', [SchoolController::class, 'schoolList'])->name('school-list');
        Route::get('/edit-school/{id}', [SchoolController::class, 'editSchool'])->name('edit-school');
        Route::post('/update-school/{id}', [SchoolController::class, 'updateSchool'])->name('update-school');
        Route::get('/delete-school/{id}', [SchoolController::class, 'deleteSchool'])->name('delete-school');
        // START - user
        Route::get('/add-user', [UserController::class, 'addUser'])->name('add-user');
        Route::post('/store-user', [UserController::class, 'storeUser'])->name('store-user');
        Route::get('/user-list', [UserController::class, 'userList'])->name('user-list');
        Route::get('/edit-user/{id}', [UserController::class, 'editUser'])->name('edit-user');
        Route::post('/update-user/{id}', [UserController::class, 'updateUser'])->name('update-user');
        Route::get('/delete-user/{id}', [UserController::class, 'deleteUser'])->name('delete-user');

        Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
        Route::get('/register-student', [StudentController::class, 'registerStudent'])->name('register-student');
        Route::get('/add-student', [StudentController::class, 'addStudent'])->name('add-student');
        Route::post('/store-student', [StudentController::class, 'storeStudent'])->name('store-student');
        Route::get('/student-list', [StudentController::class, 'studentList'])->name('student-list');
        Route::get('/edit-student/{id}', [StudentController::class, 'editStudent'])->name('edit-student');
        Route::post('/update-student/{id}', [StudentController::class, 'updateStudent'])->name('update-student');

        // START - Academic Session
        Route::get('/add-academic-session', [AcademicSessionController::class, 'add'])->name('add-academic-session');
        Route::post('/store-academic-session', [AcademicSessionController::class, 'store'])->name('store-academic-session');
        Route::get('/academic-session-list', [AcademicSessionController::class, 'list'])->name('academic-session-list');
        Route::get('/edit-academic-session/{id}', [AcademicSessionController::class, 'edit'])->name('edit-academic-session');
        Route::post('/update-academic-session/{id}', [AcademicSessionController::class, 'update'])->name('update-academic-session');
        Route::get('/delete-academic-session/{id}', [AcademicSessionController::class, 'delete'])->name('delete-academic-session');
        // END - Academic Session
        // START - Academic class
        Route::get('/add-academic-class', [AcademicClassController::class, 'add'])->name('add-academic-class');
        Route::post('/store-academic-class', [AcademicClassController::class, 'store'])->name('store-academic-class');
        Route::get('/academic-class-list', [AcademicClassController::class, 'list'])->name('academic-class-list');
        Route::get('/edit-academic-class/{id}', [AcademicClassController::class, 'edit'])->name('edit-academic-class');
        Route::post('/update-academic-class/{id}', [AcademicClassController::class, 'update'])->name('update-academic-class');
        Route::get('/delete-academic-class/{id}', [AcademicClassController::class, 'delete'])->name('delete-academic-class');
        // END - Academic class
        // START - role
        Route::get('/add-role', [RoleController::class, 'add'])->name('add-role');
        Route::post('/store-role', [RoleController::class, 'store'])->name('store-role');
        Route::get('/role-list', [RoleController::class, 'list'])->name('role-list');
        Route::get('/edit-role/{id}', [RoleController::class, 'edit'])->name('edit-role');
        Route::post('/update-role/{id}', [RoleController::class, 'update'])->name('update-role');
        Route::get('/delete-role/{id}', [RoleController::class, 'delete'])->name('delete-role');
        // END - role
    });
});
