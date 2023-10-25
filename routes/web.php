<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\AcademicSessionController;
use App\Http\Controllers\AcademicClassController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AttendanceTypeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\EmployeeCategoryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SubjectController;

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

        Route::get('/edit-user-profile', [UserController::class, 'editUserProfile'])->name('edit-user-profile');
        Route::post('/edit-user-profile', [UserController::class, 'updateUserProfile'])->name('update-user-profile');

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
        // START - Teacher
        Route::get('/add-teacher', [TeacherController::class, 'add'])->name('add-teacher');
        Route::post('/store-teacher', [TeacherController::class, 'store'])->name('store-teacher');
        Route::get('/teacher-list', [TeacherController::class, 'list'])->name('teacher-list');
        Route::get('/edit-teacher/{id}', [TeacherController::class, 'edit'])->name('edit-teacher');
        Route::post('/update-teacher/{id}', [TeacherController::class, 'update'])->name('update-teacher');
        Route::get('/delete-teacher/{id}', [TeacherController::class, 'delete'])->name('delete-teacher');
        // END - Teacher
        // START - subject
        Route::get('/add-subject', [SubjectController::class, 'add'])->name('add-subject');
        Route::post('/store-subject', [SubjectController::class, 'store'])->name('store-subject');
        Route::get('/subject-list', [SubjectController::class, 'list'])->name('subject-list');
        Route::get('/edit-subject/{id}', [SubjectController::class, 'edit'])->name('edit-subject');
        Route::post('/update-subject/{id}', [SubjectController::class, 'update'])->name('update-subject');
        Route::get('/delete-subject/{id}', [SubjectController::class, 'delete'])->name('delete-subject');
        // END - Academic class
        // START - role
        Route::get('/add-role', [RoleController::class, 'add'])->name('add-role');
        Route::post('/store-role', [RoleController::class, 'store'])->name('store-role');
        Route::get('/role-list', [RoleController::class, 'list'])->name('role-list');
        Route::get('/edit-role/{id}', [RoleController::class, 'edit'])->name('edit-role');
        Route::post('/update-role/{id}', [RoleController::class, 'update'])->name('update-role');
        Route::get('/delete-role/{id}', [RoleController::class, 'delete'])->name('delete-role');
        // END - role
        // START - Employee
        Route::get('/add-employee', [EmployeeController::class, 'addEmployee'])->name('add-employee');
        Route::post('/store-employee', [EmployeeController::class, 'storeEmployee'])->name('store-employee');
        Route::get('/employee-list', [EmployeeController::class, 'employeeList'])->name('employee-list');
        Route::get('/edit-employee/{id}', [EmployeeController::class, 'editEmployee'])->name('edit-employee');
        Route::post('/update-employee/{id}', [EmployeeController::class, 'updateEmployee'])->name('update-employee');
        Route::get('/delete-employee/{id}', [EmployeeController::class, 'deleteEmployee'])->name('delete-employee');
        //END - Employee 
        // START - Department
        Route::get('/add-department', [DepartmentController::class, 'addDepartment'])->name('add-department');
        Route::post('/store-department', [DepartmentController::class, 'storeDepartment'])->name('store-department');
        Route::get('/department-list', [DepartmentController::class, 'departmentList'])->name('department-list');
        Route::get('/edit-department/{id}', [DepartmentController::class, 'editDepartment'])->name('edit-department');
        Route::post('/update-department/{id}', [DepartmentController::class, 'updateDepartment'])->name('update-department');
        Route::get('/delete-department/{id}', [DepartmentController::class, 'deleteDepartment'])->name('delete-department');
        //END - Department
        // START - Designation
        Route::get('/add-designation', [DesignationController::class, 'addDesignation'])->name('add-designation');
        Route::post('/store-designation', [DesignationController::class, 'storeDesignation'])->name('store-designation');
        Route::get('/designation-list', [DesignationController::class, 'designationList'])->name('designation-list');
        Route::get('/edit-designation/{id}', [DesignationController::class, 'editDesignation'])->name('edit-designation');
        Route::post('/update-designation/{id}', [DesignationController::class, 'updateDesignation'])->name('update-designation');
        Route::get('/delete-designation/{id}', [DesignationController::class, 'deleteDesignation'])->name('delete-designation');
        //END - Designation
        // START - Attendance
        Route::get('/add-attendance', [AttendanceController::class, 'addAttendance'])->name('add-attendance');
        Route::post('/store-attendance', [AttendanceController::class, 'storeAttendance'])->name('store-attendance');
        Route::get('/attendance-list', [AttendanceController::class, 'attendanceList'])->name('attendance-list');
        Route::post('/attendance-list', [AttendanceController::class, 'filterAttendance'])->name('attendance-list');
        Route::get('/edit-attendance/{id}', [AttendanceController::class, 'editAttendance'])->name('edit-attendance');
        Route::post('/update-attendance/{id}', [AttendanceController::class, 'updateAttendance'])->name('update-attendance');
        Route::get('/delete-attendance/{id}', [AttendanceController::class, 'deleteAttendance'])->name('delete-attendance');
        //END - Attendance 
        // START - AttendanceType
        Route::get('/add-attendancetype', [AttendanceTypeController::class, 'addAttendanceType'])->name('add-attendancetype');
        Route::post('/store-attendancetype', [AttendanceTypeController::class, 'storeAttendanceType'])->name('store-attendancetype');
        Route::get('/attendancetype-list', [AttendanceTypeController::class, 'AttendanceTypeList'])->name('attendancetype-list');
        Route::get('/edit-attendancetype/{id}', [AttendanceTypeController::class, 'editAttendanceType'])->name('edit-attendancetype');
        Route::post('/update-attendancetype/{id}', [AttendanceTypeController::class, 'updateAttendanceType'])->name('update-attendancetype');
        Route::get('/delete-attendancetype/{id}', [AttendanceTypeController::class, 'deleteAttendanceType'])->name('delete-attendancetype');
        //END - AttendanceType 
        // START - EmployeeCategory
        Route::get('/add-employeecategory', [EmployeeCategoryController::class, 'addEmployeeCategory'])->name('add-employeecategory');
        Route::post('/store-employeecategory', [EmployeeCategoryController::class, 'storeEmployeeCategory'])->name('store-employeecategory');
        Route::get('/employeecategory-list', [EmployeeCategoryController::class, 'employeecategoryList'])->name('employeecategory-list');
        Route::get('/edit-employeecategory/{id}', [EmployeeCategoryController::class, 'editEmployeeCategory'])->name('edit-employeecategory');
        Route::post('/update-employeecategory/{id}', [EmployeeCategoryController::class, 'updateEmployeeCategory'])->name('update-employeecategory');
        Route::get('/delete-employeecategory/{id}', [EmployeeCategoryController::class, 'deleteEmployeeCategory'])->name('delete-employeecategory');
        //END - EmployeeCategory 
    });
});
