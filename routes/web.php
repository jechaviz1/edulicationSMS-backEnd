<?php

use App\Http\Controllers\BatchController;
use App\Http\Controllers\ClassRoomController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\ExamTypeController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\LeaveAllocationController;
use App\Http\Controllers\LeaveRequestController;
use App\Http\Controllers\LeaveTypeController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\SessionController;
use App\Models\Grade;
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
        Route::get('/generate-nat-file', [StudentController::class, 'generateNatFile'])->name('generate-nat-file');

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
        Route::post('/attendance-get', [AttendanceController::class, 'filterAttendance'])->name('attendance-get');
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

         // START - LeaveType
         Route::get('/add-leavetype', [LeaveTypeController::class, 'addLeaveType'])->name('add-leavetype');
         Route::post('/store-leavetype', [LeaveTypeController::class, 'storeLeaveType'])->name('store-leavetype');
          Route::get('/leavetype-list', [LeaveTypeController::class, 'leavetypeList'])->name('leavetype-list');
          Route::get('/edit-leavetype/{id}', [LeaveTypeController::class, 'editLeaveType'])->name('edit-leavetype');
          Route::post('/update-leavetype/{id}', [LeaveTypeController::class, 'updateLeaveType'])->name('update-leavetype');
          Route::get('/delete-leavetype/{id}', [LeaveTypeController::class, 'deleteLeaveType'])->name('delete-leavetype');
         //END - LeaveType 
 
          // START - LeaveRequest
          Route::get('/add-leaverequest', [LeaveRequestController::class, 'addLeaveRequest'])->name('add-leaverequest');
          Route::post('/store-leaverequest', [LeaveRequestController::class, 'storeLeaveRequest'])->name('store-leaverequest');
           Route::get('/leaverequest-list', [LeaveRequestController::class, 'leaverequestList'])->name('leaverequest-list');
           Route::get('/edit-leaverequest/{id}', [LeaveRequestController::class, 'editLeaveRequest'])->name('edit-leaverequest');
           Route::post('/update-leaverequest/{id}', [LeaveRequestController::class, 'updateLeaveRequest'])->name('update-leaverequest');
           Route::get('/delete-leaverequest/{id}', [LeaveRequestController::class, 'deleteLeaveRequest'])->name('delete-leaverequest');
           Route::get('/leaverequest-detail/{id}', [LeaveRequestController::class, 'leaverequestDetail'])->name('leaverequest-detail');
           Route::post('/add-leaverequest-detail', [LeaveRequestController::class, 'AddleaverequestDetail'])->name('add-leaverequest-detail');
          //END - LeaveRequest 

          // START - LeaveAllocation
          Route::get('/add-leaveallocation', [LeaveAllocationController::class, 'addLeaveAllocation'])->name('add-leaveallocation');
          Route::post('/store-leaveallocation', [LeaveAllocationController::class, 'storeLeaveAllocation'])->name('store-leaveallocation');
           Route::get('/leaveallocation-list', [LeaveAllocationController::class, 'leaveallocationList'])->name('leaveallocation-list');
           Route::get('/edit-leaveallocation/{id}', [LeaveAllocationController::class, 'editLeaveAllocation'])->name('edit-leaveallocation');
           Route::post('/update-leaveallocation/{id}', [LeaveAllocationController::class, 'updateLeaveAllocation'])->name('update-leaveallocation');
           Route::get('/delete-leaveallocation/{id}', [LeaveAllocationController::class, 'deleteLeaveAllocation'])->name('delete-leaveallocation');
        //    Route::get('/leaveallocation-detail/{id}', [LeaveAllocationController::class, 'leaveallocationDetail'])->name('leaveallocation-detail');
          //END - LeaveAllocation 


           // START - Exams
           Route::get('/add-examtypes', [ExamTypeController::class, 'addExamType'])->name('add-examtypes');
           Route::post('/store-examtypes', [ExamTypeController::class, 'storeExamType'])->name('store-examtypes');
            Route::get('/examtype-list', [ExamTypeController::class, 'examtypeList'])->name('examtype-list');
            Route::get('/edit-examtype/{id}', [ExamTypeController::class, 'editExamType'])->name('edit-examtype');
            Route::post('/update-examtype/{id}', [ExamTypeController::class, 'updateExamType'])->name('update-examtype');
            Route::get('/delete-examtype/{id}', [ExamTypeController::class, 'deleteExamType'])->name('delete-examtype');
           //END - Exams 

           // START - Grade
           Route::get('/add-grade', [GradeController::class, 'addGrade'])->name('add-grade');
           Route::post('/store-grade', [GradeController::class, 'storeGrade'])->name('store-grade');
            Route::get('/grade-list', [GradeController::class, 'gradeList'])->name('grade-list');
            Route::get('/edit-grade/{id}', [GradeController::class, 'editGrade'])->name('edit-grade');
            Route::post('/update-grade/{id}', [GradeController::class, 'updateGrade'])->name('update-grade');
            Route::get('/delete-grade/{id}', [GradeController::class, 'deleteGrade'])->name('delete-grade');
           //END - Grade 

           // START - Faculty
           Route::get('/add-faculty', [FacultyController::class, 'addFaculty'])->name('add-faculty');
           Route::post('/store-faculty', [FacultyController::class, 'storeFaculty'])->name('store-faculty');
            Route::get('/faculty-list', [FacultyController::class, 'facultyList'])->name('faculty-list');
            Route::get('/edit-faculty/{id}', [FacultyController::class, 'editFaculty'])->name('edit-faculty');
            Route::post('/update-faculty/{id}', [FacultyController::class, 'updateFaculty'])->name('update-faculty');
            Route::get('/delete-faculty/{id}', [FacultyController::class, 'deleteFaculty'])->name('delete-faculty');
           //END - Faculty

           // START - Program
           Route::get('/add-program', [ProgramController::class, 'addProgram'])->name('add-program');
           Route::post('/store-program', [ProgramController::class, 'storePRogram'])->name('store-program');
            Route::get('/program-list', [ProgramController::class, 'programList'])->name('program-list');
            Route::get('/edit-program/{id}', [ProgramController::class, 'editProgram'])->name('edit-program');
            Route::post('/update-program/{id}', [ProgramController::class, 'updateProgram'])->name('update-program');
            Route::get('/delete-program/{id}', [ProgramController::class, 'deleteProgram'])->name('delete-program');
           //END - Program


           // START - Batch
           Route::get('/add-batch', [BatchController::class, 'addBatch'])->name('add-batch');
           Route::post('/store-batch', [BatchController::class, 'storeBatch'])->name('store-batch');
            Route::get('/batch-list', [BatchController::class, 'batchList'])->name('batch-list');
            Route::get('/edit-batch/{id}', [BatchController::class, 'editBatch'])->name('edit-batch');
            Route::post('/update-batch/{id}', [BatchController::class, 'updateBatch'])->name('update-batch');
            Route::get('/delete-batch/{id}', [BatchController::class, 'deleteBatch'])->name('delete-batch');
           //END - Batch

           // START - Session
           Route::get('/add-session', [SessionController::class, 'addSession'])->name('add-session');
           Route::get('/session-list-current/{id}', 'SessionController@current')->name('session-list.current');
           Route::post('/store-session', [SessionController::class, 'storeSession'])->name('store-session');
            Route::get('/session-list', [SessionController::class, 'SessionList'])->name('session-list');
            Route::get('/edit-session/{id}', [SessionController::class, 'editSession'])->name('edit-session');
            Route::post('/update-session/{id}', [SessionController::class, 'updateSession'])->name('update-session');
            Route::get('/delete-session/{id}', [SessionController::class, 'deleteSession'])->name('delete-session');
           //END - Session

            // START - Semester
            Route::get('/add-semester', [SemesterController::class, 'addSemester'])->name('add-semester');
           // Route::get('/semester-list-current/{id}', 'SessionController@current')->name('session-list.current');
            Route::post('/store-semester', [SemesterController::class, 'storeSemester'])->name('store-semester');
             Route::get('/semester-list', [SemesterController::class, 'semesterList'])->name('semester-list');
             Route::get('/edit-semester/{id}', [SemesterController::class, 'editSemester'])->name('edit-semester');
             Route::post('/update-semester/{id}', [SemesterController::class, 'updateSemester'])->name('update-semester');
             Route::get('/delete-semester/{id}', [SemesterController::class, 'deleteSemester'])->name('delete-semester');
            //END - Semester

               // START - Semester
               Route::get('/add-semester', [SemesterController::class, 'addSemester'])->name('add-semester');
               // Route::get('/semester-list-current/{id}', 'SessionController@current')->name('session-list.current');
                Route::post('/store-semester', [SemesterController::class, 'storeSemester'])->name('store-semester');
                 Route::get('/semester-list', [SemesterController::class, 'semesterList'])->name('semester-list');
                 Route::get('/edit-semester/{id}', [SemesterController::class, 'editSemester'])->name('edit-semester');
                 Route::post('/update-semester/{id}', [SemesterController::class, 'updateSemester'])->name('update-semester');
                 Route::get('/delete-semester/{id}', [SemesterController::class, 'deleteSemester'])->name('delete-semester');
                //END - Semester


                 // START - Section
                 Route::get('/add-section', [SectionController::class, 'addSection'])->name('add-section');
                 Route::post('/store-section', [SectionController::class, 'storeSection'])->name('store-section');
                 Route::get('/section-list', [SectionController::class, 'sectionList'])->name('section-list');
                 Route::get('/edit-section/{id}', [SectionController::class, 'editSection'])->name('edit-section');
                 Route::post('/update-section/{id}', [SectionController::class, 'updateSection'])->name('update-section');
                 Route::get('/delete-section/{id}', [SectionController::class, 'deleteSection'])->name('delete-section');
                //END - Section

                // START - Classroom
                Route::get('/add-classroom', [ClassRoomController::class, 'addClassroom'])->name('add-classroom');
                Route::post('/store-classroom', [ClassRoomController::class, 'storeClassroom'])->name('store-classroom');
                Route::get('/classroom-list', [ClassRoomController::class, 'classroomList'])->name('classroom-list');
                Route::get('/edit-classroom/{id}', [ClassRoomController::class, 'editClassroom'])->name('edit-classroom');
                Route::post('/update-classroom/{id}', [ClassRoomController::class, 'updateClassroom'])->name('update-classroom');
                Route::get('/delete-classroom/{id}', [ClassRoomController::class, 'deleteClassroom'])->name('delete-classroom');
               //END - Classroom

               // START - Courses
              //  Route::get('/add-course', [CourseController::class, 'addCourse'])->name('add-course');
              //  Route::post('/store-course', [CourseController::class, 'storeCourse'])->name('store-course');
              //  Route::get('/course-list', [CourseController::class, 'courseList'])->name('course-list');
              //  Route::get('/edit-course/{id}', [CourseController::class, 'editCourse'])->name('edit-course');
              //  Route::post('/update-course/{id}', [CourseController::class, 'updateCourse'])->name('update-course');
              //  Route::get('/delete-course/{id}', [CourseController::class, 'deleteCourse'])->name('delete-course');
              //END - Courses
    });
});
