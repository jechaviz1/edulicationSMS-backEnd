<?php

use App\Http\Controllers\BatchController;
use App\Http\Controllers\ClassRoomController;
use App\Http\Controllers\ClassRoutineController;
use App\Http\Controllers\CourseCategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollSubjectController;
use App\Http\Controllers\ExamAttendanceController;
use App\Http\Controllers\ExamRoutineController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\ExamTypeController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\LeaveAllocationController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\LeaveManagementController;
use App\Http\Controllers\LeaveRequestController;
use App\Http\Controllers\LeaveTypeController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ResultContributionController;
use App\Http\Controllers\RoutineSettingController;
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
use App\Http\Controllers\FeesCategoryController;
use App\Http\Controllers\FeesDiscountController;
use App\Http\Controllers\FeesFineController;
use App\Http\Controllers\FeesReceiptController;
use App\Http\Controllers\FeesMasterController;
use App\Http\Controllers\FeesStudentController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StatusTypeController;
use App\Http\Controllers\StudentIdCardSettingController;
use App\Http\Controllers\ContentTypeController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\WorkShiftTypeController;
use App\Http\Controllers\StaffAttendanceController;
use App\Http\Controllers\StaffHourlyAttendanceController;
use App\Http\Controllers\StaffNoteController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\TaxSettingController;
use App\Http\Controllers\PaySlipSettingController;
use App\Http\Controllers\IncomeCategoryController;
use App\Http\Controllers\ExpenseCategoryController;
// use App\Http\Controllers\CourseCategoryController;
// use App\Http\Controllers\CourseController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\CityTownController;

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
    // END - subject
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
    // START - StaffLeave
    Route::get('/add-staffleave', [LeaveController::class, 'add'])->name('add-staffleave');
    Route::post('/store-staffleave', [LeaveController::class, 'store'])->name('store-staffleave');
    Route::get('/staffleave-list', [LeaveController::class, 'List'])->name('staffleave-list');
    Route::get('/edit-staffleave/{id}', [LeaveController::class, 'edit'])->name('edit-staffleave');
    Route::post('/update-staffleave/{id}', [LeaveController::class, 'update'])->name('update-staffleave');
    Route::get('/delete-staffleave/{id}', [LeaveController::class, 'delete'])->name('delete-staffleave');
    //END - StaffLeave 
    // START - LeaveManage
    Route::get('/add-leavemanage', [LeaveManagementController::class, 'add'])->name('add-leavemanage');
    Route::post('/store-leavemanage', [LeaveManagementController::class, 'store'])->name('store-leavemanage');
    Route::get('/leavemanage-list', [LeaveManagementController::class, 'List'])->name('leavemanage-list');
    Route::get('/edit-leavemanage/{id}', [LeaveManagementController::class, 'edit'])->name('edit-leavemanage');
    Route::post('/update-leavemanage/{id}', [LeaveManagementController::class, 'update'])->name('update-leavemanage');
    Route::get('/delete-leavemanage/{id}', [LeaveManagementController::class, 'delete'])->name('delete-leavemanage');
    Route::post('/leavemanage-status/{id}', [LeaveManagementController::class, 'status'])->name('leavemanage-status');
    //END - LeaveManage 
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
    // START - enrollsubject
    Route::get('/add-enrollsubject', [EnrollSubjectController::class, 'addEnrollsubject'])->name('add-enrollsubject');
    Route::post('/store-enrollsubject', [EnrollSubjectController::class, 'storeEnrollsubject'])->name('store-enrollsubject');
    Route::get('/enrollsubject-list', [EnrollSubjectController::class, 'enrollsubjectList'])->name('enrollsubject-list');
    Route::get('/edit-enrollsubject/{id}', [EnrollSubjectController::class, 'editEnrollsubject'])->name('edit-enrollsubject');
    Route::post('/update-enrollsubject/{id}', [EnrollSubjectController::class, 'updateEnrollsubject'])->name('update-enrollsubject');
    Route::get('/delete-enrollsubject/{id}', [EnrollSubjectController::class, 'deleteEnrollsubject'])->name('delete-enrollsubject');
    // END - enrollsubject

    // START - classroutine
    Route::get('/add-classroutine', [ClassRoutineController::class, 'addClassRoutine'])->name('add-classroutine');
    Route::post('/store-classroutine', [ClassRoutineController::class, 'storeClassRoutine'])->name('store-classroutine');
    Route::get('/classroutine-list', [ClassRoutineController::class, 'classroutineList'])->name('classroutine-list');
    Route::get('/edit-classroutine/{id}', [ClassRoutineController::class, 'editClassRoutine'])->name('edit-classroutine');
    Route::post('/update-classroutine/{id}', [ClassRoutineController::class, 'updateClassRoutine'])->name('update-classroutine');
    Route::get('/delete-classroutine/{id}', [ClassRoutineController::class, 'deleteClassRoutine'])->name('delete-classroutine');
    Route::get('/class-routine-teacher', [ClassRoutineController::class, 'teacher'])->name('class-routine.teacher');
    Route::post('/class_routine/print', [ClassRoutineController::class, 'print'])->name('class-routine.print');
    Route::get('/routine-setting/class', [RoutineSettingController::class, 'class'])->name('routine-setting.class');
    Route::get('/routine-setting/exam', [RoutineSettingController::class, 'exam'])->name('routine-setting.exam');
    Route::post('/routine-setting/store', [RoutineSettingController::class, 'store'])->name('routine-setting.store');
    // END - classroutine
    // START - examroutine
    Route::get('/add-examroutine', [ExamRoutineController::class, 'addExamRoutine'])->name('add-examroutine');
    Route::post('/store-examroutine', [ExamRoutineController::class, 'storeExamRoutine'])->name('store-examroutine');
    Route::get('/examroutine-list', [ExamRoutineController::class, 'examroutineList'])->name('examroutine-list');
    Route::get('/edit-examroutine/{id}', [ExamRoutineController::class, 'editExamRoutine'])->name('edit-examroutine');
    Route::post('/update-examroutine/{id}', [ExamRoutineController::class, 'updateExamRoutine'])->name('update-examroutine');
    Route::get('/delete-examroutine/{id}', [ExamRoutineController::class, 'deleteExamRoutine'])->name('delete-examroutine');
    Route::post('/exam_routine/print', [ExamRoutineController::class, 'print'])->name('exam-routine.print');
    // END - examroutine
    // START - coursecategory
    Route::get('/add-coursecategory', [CourseCategoryController::class, 'addCourseCategory'])->name('add-coursecategory');
    Route::post('/store-coursecategory', [CourseCategoryController::class, 'storeCourseCategory'])->name('store-coursecategory');
    Route::get('/coursecategory-list', [CourseCategoryController::class, 'coursecategoryList'])->name('coursecategory-list');
    Route::get('/edit-coursecategory/{id}', [CourseCategoryController::class, 'editCourseCategory'])->name('edit-coursecategory');
    Route::post('/update-coursecategory/{id}', [CourseCategoryController::class, 'updateCourseCategory'])->name('update-coursecategory');
    Route::get('/delete-coursecategory/{id}', [CourseCategoryController::class, 'deleteCourseCategory'])->name('delete-coursecategory');
    // END - coursecategory
    //start-FilterController
    Route::post('filter-batch', [FilterController::class, 'filterBatch'])->name('filter-batch');
    Route::post('filter-program', [FilterController::class, 'filterProgram'])->name('filter-program');
    Route::post('filter-session', [FilterController::class, 'filterSession'])->name('filter-session');
    Route::post('filter-semester', [FilterController::class, 'filterSemester'])->name('filter-semester');
    Route::post('filter-section', [FilterController::class, 'filterSection'])->name('filter-section');
    Route::post('filter-subject', [FilterController::class, 'filterSubject'])->name('filter-subject');
    Route::post('filter-enroll-subject', [FilterController::class, 'filterEnrollSubject'])->name('filter-enroll-subject');
    //End-FilterController
    // START - Fees Type
    Route::get('/add-fees-category', [FeesCategoryController::class, 'add'])->name('add-fees-category');
    Route::post('/store-fees-type', [FeesCategoryController::class, 'store'])->name('store-fees-type');
    Route::get('/fees-categoris-list', [FeesCategoryController::class, 'list'])->name('fees-categoris-list');
    Route::get('/edit-fees-type/{id}', [FeesCategoryController::class, 'edit'])->name('edit-fees-type');
    Route::post('/update-fees-type/{id}', [FeesCategoryController::class, 'update'])->name('update-fees-type');
    Route::get('/delete-fees-type/{id}', [FeesCategoryController::class, 'delete'])->name('delete-fees-type');
    // END - Fees Type
    // START - Fees Discount
    Route::get('/add-fees-discount', [FeesDiscountController::class, 'add'])->name('add-fees-discount');
    Route::post('/store-fees-discount', [FeesDiscountController::class, 'store'])->name('store-fees-discount');
    Route::get('/fees-discount-list', [FeesDiscountController::class, 'list'])->name('fees-discount-list');
    Route::get('/edit-fees-discount/{id}', [FeesDiscountController::class, 'edit'])->name('edit-fees-discount');
    Route::post('/update-fees-discount/{id}', [FeesDiscountController::class, 'update'])->name('update-fees-discount');
    Route::get('/delete-fees-discount/{id}', [FeesDiscountController::class, 'delete'])->name('delete-fees-discount');
    // END - Fees Discount
    // START - Fees Fines
    Route::get('/add-fees-fine', [FeesFineController::class, 'add'])->name('add-fees-fine');
    Route::post('/store-fees-fine', [FeesFineController::class, 'store'])->name('store-fees-fine');
    Route::get('/fees-fine-list', [FeesFineController::class, 'list'])->name('fees-fine-list');
    Route::get('/edit-fees-fine/{id}', [FeesFineController::class, 'edit'])->name('edit-fees-fine');
    Route::post('/update-fees-fine/{id}', [FeesFineController::class, 'update'])->name('update-fees-fine');
    Route::get('/delete-fees-fine/{id}', [FeesFineController::class, 'delete'])->name('delete-fees-fine');
    // END - Fees Fines
    // START - fees-receipt
    Route::get('/add-fees-receipt', [FeesReceiptController::class, 'index'])->name('add-fees-receipt');
    Route::post('/store-fees-receipt', [FeesReceiptController::class, 'store'])->name('store-fees-receipt');
    // END - fees-receipt
    // START - fees-master
    Route::get('/list-fees-master', [FeesMasterController::class, 'index'])->name('list-fees-master');
    Route::get('/add-fees-master', [FeesMasterController::class, 'add'])->name('add-fees-master');
    Route::post('/store-fees-master', [FeesMasterController::class, 'store'])->name('store-fees-master');
    // END - fees-master
    // fees - student
    Route::get('/fees-student', [FeesStudentController::class, 'index'])->name('fees-student');
    Route::get('/fees-student-quick-assign', [FeesStudentController::class, 'quickAssign'])->name('fees-student-quick-assign');
    Route::post('/fees-student-quick-assign', [FeesStudentController::class, 'quickAssignStore'])->name('fees-student-quick-assign-store');
    Route::get('/fees-student-quick-received', [FeesStudentController::class, 'quickReceived'])->name('fees-student-quick-received');
    Route::post('/fees-student-quick-received', [FeesStudentController::class, 'quickReceivedStore'])->name('fees-student-quick-received-store');
    Route::get('/fees-student-report', [FeesStudentController::class, 'report'])->name('fees-student-report');
    Route::get('fees-student-print/{id}', [FeesStudentController::class, 'print'])->name('fees-student-print');
    Route::post('fees-student-unpay/{id}', [FeesStudentController::class, 'unpay'])->name('fees-student-unpay');
    Route::post('fees-student-pay', [FeesStudentController::class, 'pay'])->name('fees-student-pay');
    Route::post('fees-student-cancel/{id}', [FeesStudentController::class, 'cancel'])->name('fees-student-cancel');
    // setting 
    Route::get('/setting', [SettingController::class, 'index'])->name('setting');
    Route::post('/store-setting', [SettingController::class, 'store'])->name('store-setting');
    // START - status Type
    Route::get('/add-status-type', [StatusTypeController::class, 'add'])->name('add-status-type');
    Route::post('/store-status-type', [StatusTypeController::class, 'store'])->name('store-status-type');
    Route::get('/status-type-list', [StatusTypeController::class, 'list'])->name('status-type-list');
    Route::get('/edit-status-type/{id}', [StatusTypeController::class, 'edit'])->name('edit-status-type');
    Route::post('/update-status-type/{id}', [StatusTypeController::class, 'update'])->name('update-status-type');
    Route::get('/delete-status-type/{id}', [StatusTypeController::class, 'delete'])->name('delete-status-type');
    // END - status Type
    // START - student-id-card
    Route::get('/id-card-setting', [StudentIdCardSettingController::class, 'index'])->name('id-card-setting');
    Route::post('/store-id-card-setting', [StudentIdCardSettingController::class, 'store'])->name('store-id-card-setting');
    // END - student-id-card
    // START - Content Type
    Route::get('/content-type-list', [ContentTypeController::class, 'list'])->name('content-type-list');
    Route::get('/add-content-type', [ContentTypeController::class, 'add'])->name('add-content-type');
    Route::post('/store-content-type', [ContentTypeController::class, 'store'])->name('store-content-type');
    Route::get('/edit-content-type/{id}', [ContentTypeController::class, 'edit'])->name('edit-content-type');
    Route::post('/update-content-type/{id}', [ContentTypeController::class, 'update'])->name('update-content-type');
    Route::get('/delete-content-type/{id}', [ContentTypeController::class, 'delete'])->name('delete-content-type');
    // END - Content Type
    // START - Content
    Route::get('/content-list', [ContentController::class, 'list'])->name('content-list');
    Route::get('/add-content', [ContentController::class, 'add'])->name('add-content');
    Route::post('/store-content', [ContentController::class, 'store'])->name('store-content');
    Route::get('/edit-content/{id}', [ContentController::class, 'edit'])->name('edit-content');
    Route::post('/update-content/{id}', [ContentController::class, 'update'])->name('update-content');
    Route::get('/delete-content/{id}', [ContentController::class, 'delete'])->name('delete-content');
    // END - Content
    // START - assignment
    Route::get('/assignment-list', [AssignmentController::class, 'list'])->name('assignment-list');
    Route::get('/add-assignment', [AssignmentController::class, 'add'])->name('add-assignment');
    Route::post('/store-assignment', [AssignmentController::class, 'store'])->name('store-assignment');
    Route::get('/edit-assignment/{id}', [AssignmentController::class, 'edit'])->name('edit-assignment');
    Route::post('/update-assignment/{id}', [AssignmentController::class, 'update'])->name('update-assignment');
    Route::get('/delete-assignment/{id}', [AssignmentController::class, 'delete'])->name('delete-assignment');
    // END - assignment
    //START-ResultContribution
    Route::get('/resultcontribution-list', [ResultContributionController::class, 'list'])->name('resultcontribution-list');
    Route::get('/add-resultcontribution', [ResultContributionController::class, 'add'])->name('add-resultcontribution');
    Route::post('/store-resultcontribution', [ResultContributionController::class, 'store'])->name('store-resultcontribution');
    Route::get('/edit-resultcontribution/{id}', [ResultContributionController::class, 'edit'])->name('edit-resultcontribution');
    Route::post('/update-resultcontribution/{id}', [ResultContributionController::class, 'update'])->name('update-resultcontribution');
    Route::get('/delete-resultcontribution/{id}', [ResultContributionController::class, 'delete'])->name('delete-resultcontribution');
    //END-ResultContribution
    //START-ExamAttendance
    Route::get('/examattendance-list', [ExamAttendanceController::class, 'list'])->name('examattendance-list');
    Route::get('/add-examattendance', [ExamAttendanceController::class, 'add'])->name('add-examattendance');
    Route::post('/store-examattendance', [ExamAttendanceController::class, 'store'])->name('store-examattendance');
    Route::get('/edit-examattendance/{id}', [ExamAttendanceController::class, 'edit'])->name('edit-examattendance');
    Route::post('/update-examattendance/{id}', [ExamAttendanceController::class, 'update'])->name('update-examattendance');
    Route::get('/delete-examattendance/{id}', [ExamAttendanceController::class, 'delete'])->name('delete-examattendance');
    //END-ExamAttendance
    // START - work shift Type
    Route::get('/add-work-shift-type', [WorkShiftTypeController::class, 'add'])->name('add-work-shift-type');
    Route::post('/store-work-shift-type', [WorkShiftTypeController::class, 'store'])->name('store-work-shift-type');
    Route::get('/work-shift-type-list', [WorkShiftTypeController::class, 'list'])->name('work-shift-type-list');
    Route::get('/edit-work-shift-type/{id}', [WorkShiftTypeController::class, 'edit'])->name('edit-work-shift-type');
    Route::post('/update-work-shift-type/{id}', [WorkShiftTypeController::class, 'update'])->name('update-work-shift-type');
    Route::get('/delete-work-shift-type/{id}', [WorkShiftTypeController::class, 'delete'])->name('delete-work-shift-type');
    // END - work shift Type
    // START - attendance type
    Route::get('/staff-daily-attendance', [StaffAttendanceController::class, 'index'])->name('staff-daily-attendance');
    Route::post('/staff-daily-attendance-store', [StaffAttendanceController::class, 'store'])->name('staff-daily-attendance-store');
    Route::get('/staff-daily-attendance-report', [StaffAttendanceController::class, 'report'])->name('staff-daily-attendance-report');
    Route::get('/staff-hourly-attendance', [StaffHourlyAttendanceController::class, 'index'])->name('staff-hourly-attendance');
    //End - attendance type
    // START - Staff Note
    Route::get('/add-staff-note', [StaffNoteController::class, 'add'])->name('add-staff-note');
    Route::post('/store-staff-note', [StaffNoteController::class, 'store'])->name('store-staff-note');
    Route::get('/staff-note-list', [StaffNoteController::class, 'list'])->name('staff-note-list');
    Route::get('/edit-staff-note/{id}', [StaffNoteController::class, 'edit'])->name('edit-staff-note');
    Route::post('/update-staff-note/{id}', [StaffNoteController::class, 'update'])->name('update-staff-note');
    Route::get('/delete-staff-note/{id}', [StaffNoteController::class, 'delete'])->name('delete-staff-note');
    // END - Staff Note
    // START - Payroll
    Route::get('/payroll', [PayrollController::class, 'index'])->name('payroll');
    Route::get('/payroll_generate/{id}/{month}/{year}', [PayrollController::class, 'generate'])->name('payroll_generate');
    Route::post('/payroll_generete_store', [PayrollController::class, 'store'])->name('payroll_generete_store');
    Route::post('/payroll_pay/{id}', [PayrollController::class, 'pay'])->name('payroll_pay');
    Route::get('/payroll_print/{id}', [PayrollController::class, 'print'])->name('payroll_print');
    Route::post('/payroll_unpay/{id}', [PayrollController::class, 'unpay'])->name('payroll_unpay');
    Route::get('/payroll_report', [PayrollController::class, 'report'])->name('payroll_report');
    //End - Payroll
    // START - Tax Setting
    Route::get('/add-tax-setting', [TaxSettingController::class, 'add'])->name('add-tax-setting');
    Route::post('/store-tax-setting', [TaxSettingController::class, 'store'])->name('store-tax-setting');
    Route::get('/tax-setting-list', [TaxSettingController::class, 'list'])->name('tax-setting-list');
    Route::get('/edit-tax-setting/{id}', [TaxSettingController::class, 'edit'])->name('edit-tax-setting');
    Route::post('/update-tax-setting/{id}', [TaxSettingController::class, 'update'])->name('update-tax-setting');
    Route::get('/delete-tax-setting/{id}', [TaxSettingController::class, 'delete'])->name('delete-tax-setting');
    // END - Tax Setting
    // START - pay slip setting
    Route::get('/add-pay-slip-setting', [PaySlipSettingController::class, 'index'])->name('add-pay-slip-setting');
    Route::post('/store-pay-slip-setting', [PaySlipSettingController::class, 'store'])->name('store-pay-slip-setting');
    // END - pay slip setting
    // START - Income Categories
    Route::get('/add_income_category', [IncomeCategoryController::class, 'add'])->name('add_income_category');
    Route::post('/store_income_category', [IncomeCategoryController::class, 'store'])->name('store_income_category');
    Route::get('/income_categoris', [IncomeCategoryController::class, 'list'])->name('income_categoris');
    Route::get('/edit_income_category/{id}', [IncomeCategoryController::class, 'edit'])->name('edit_income_category');
    Route::post('/update_income_category/{id}', [IncomeCategoryController::class, 'update'])->name('update_income_category');
    Route::get('/delete_income_category/{id}', [IncomeCategoryController::class, 'delete'])->name('delete_income_category');
    // END - Income Categories
    // START - Expense Category
    Route::get('/add_expense_category', [ExpenseCategoryController::class, 'add'])->name('add_expense_category');
    Route::post('/store_expense_category', [ExpenseCategoryController::class, 'store'])->name('store_expense_category');
    Route::get('/expense_categoris', [ExpenseCategoryController::class, 'list'])->name('expense_categoris');
    Route::get('/edit_expense_category/{id}', [ExpenseCategoryController::class, 'edit'])->name('edit_expense_category');
    Route::post('/update_expense_category/{id}', [ExpenseCategoryController::class, 'update'])->name('update_expense_category');
    Route::get('/delete_expense_category/{id}', [ExpenseCategoryController::class, 'delete'])->name('delete_expense_category');
    // END - Expense Category
    // START - coursecategory
    Route::get('/add-coursecategory', [CourseCategoryController::class, 'addCourseCategory'])->name('add-coursecategory');
    Route::post('/store-coursecategory', [CourseCategoryController::class, 'storeCourseCategory'])->name('store-coursecategory');
    Route::get('/coursecategory-list', [CourseCategoryController::class, 'coursecategoryList'])->name('coursecategory-list');
    Route::get('/edit-coursecategory/{id}', [CourseCategoryController::class, 'editCourseCategory'])->name('edit-coursecategory');
    Route::post('/update-coursecategory/{id}', [CourseCategoryController::class, 'updateCourseCategory'])->name('update-coursecategory');
    Route::get('/delete-coursecategory/{id}', [CourseCategoryController::class, 'deleteCourseCategory'])->name('delete-coursecategory');
    // END - coursecategory
    // START - course
    Route::get('/add-course', [CourseController::class, 'add'])->name('add-course');
    Route::post('/store-course', [CourseController::class, 'store'])->name('store-course');
    Route::get('/course-list', [CourseController::class, 'list'])->name('course-list');
    Route::get('/edit-course/{id}', [CourseController::class, 'edit'])->name('edit-course');
    Route::post('/update-course/{id}', [CourseController::class, 'update'])->name('update-course');
    Route::get('/delete-course/{id}', [CourseController::class, 'delete'])->name('delete-course');
    Route::get('/change-course-status/{id}/{status}', [CourseController::class, 'changestatus'])->name('change-course-status');
    Route::post('/store-avetmisscode', [CourseController::class, 'avetmisscodestore'])->name('store-avetmisscode');
    Route::post('/saveCourseCity', [CourseController::class, 'saveCourseCity'])->name('saveCourseCity');
    Route::post('/course/trainer', [CourseController::class, 'courseTrainer'])->name('course.trainer');
    Route::post('/course/assessor', [CourseController::class, 'assessor'])->name('course.assessors');
    Route::post('/course/document', [CourseController::class, 'courseDocument'])->name('submit.course.document');
    Route::get('/course/document/{id}', [CourseController::class, 'courseDocumentDelete'])->name('document.course.delete');
    //Module
    Route::post('/module/add', [CourseController::class, 'module'])->name('module.add');
    Route::post('/module/edit', [CourseController::class, 'moduleEdit'])->name('module.edit');
    Route::post('/module/delete', [CourseController::class, 'MODULEDELETE'])->name('module.delete');
    Route::post('/store-unit', [CourseController::class, 'storeunit'])->name('store-unit');
    Route::post('/update-unit/{id}', [CourseController::class, 'updateunit'])->name('update-unit');
    Route::get('/delete-unit/{id}', [CourseController::class, 'deleteunit'])->name('delete-unit');
    Route::get('/change-unit-status/{id}/{status}', [CourseController::class, 'changeunitstatus'])->name('change-unit-status');
    // END - course
    // START - Region
    Route::get('/add-ragion', [RegionController::class, 'add'])->name('add-ragion');
    Route::post('/store-ragion', [RegionController::class, 'store'])->name('store-ragion');
    Route::get('/ragion-list', [RegionController::class, 'list'])->name('ragion-list');
    Route::get('/edit-ragion/{id}', [RegionController::class, 'edit'])->name('edit-ragion');
    Route::post('/update-ragion/{id}', [RegionController::class, 'update'])->name('update-ragion');
    Route::get('/delete-ragion/{id}', [RegionController::class, 'delete'])->name('delete-ragion');
    // END - Region
    // START - City Town
    Route::get('/add-city-town', [CityTownController::class, 'add'])->name('add-city-town');
    Route::post('/store-city-town', [CityTownController::class, 'store'])->name('store-city-town');
    Route::get('/city-town-list', [CityTownController::class, 'list'])->name('city-town-list');
    Route::get('/edit-city-town/{id}', [CityTownController::class, 'edit'])->name('edit-city-town');
    Route::post('/update-city-town/{id}', [CityTownController::class, 'update'])->name('update-city-town');
    Route::get('/delete-city-town/{id}', [CityTownController::class, 'delete'])->name('delete-city-town');
    Route::get('/change-citytown-status/{id}/{status}', [CityTownController::class, 'changestatus'])->name('change-citytown-status');
    // END - City Town
    // START - Event Courses 
    Route::get('/events/courses', [App\Http\Controllers\Event\CourseController::class, 'index'])->name('event.courses');
    Route::post('/events/couser/store', [App\Http\Controllers\Event\CourseController::class, 'store'])->name('event.courses.store');
    Route::get('/events/couser/{id}', [App\Http\Controllers\Event\CourseController::class, 'destroy'])->name('event.courses.destroy');
    Route::get('/events/cousers', [App\Http\Controllers\Event\CourseController::class, 'status'])->name('event-courses-status');
    Route::get('/events/archive', [App\Http\Controllers\Event\CourseController::class, 'archive'])->name('event.courses.archive');
    Route::get('/events/course/{id}', [App\Http\Controllers\Event\CourseController::class, 'course_event'])->name('event.course.update');
    Route::post('/course/event/note', [App\Http\Controllers\Event\CourseController::class, 'course_note'])->name('course.event.note');
    Route::post('/course/event/note/edit', [App\Http\Controllers\Event\CourseController::class, 'edit_course'])->name('event.note.course.edit');
    Route::post('/course/event/note/delete', [App\Http\Controllers\Event\CourseController::class, 'delete_course'])->name('event.note.course.delete');
    Route::post('/course/event/smssendlearners', [App\Http\Controllers\Event\CourseController::class, 'sms_send_course'])->name('event.course.sendAllLearnersSMS');
    //  Route::get('/city-town-list', [CityTownController::class, 'list'])->name('city-town-list');
    //  Route::get('/edit-city-town/{id}', [CityTownController::class, 'edit'])->name('edit-city-town');
    //  Route::get('/delete-city-town/{id}', [CityTownController::class, 'delete'])->name('delete-city-town');
    //  Route::get('/change-citytown-status/{id}/{status}', [CityTownController::class, 'changestatus'])->name('change-citytown-status');
    // END - Event Courses 
    // START - Event calender 
    Route::get('/events/calender', [App\Http\Controllers\CalenderController::class, 'index'])->name('event.calender');
    Route::get('/events/calender/session', [App\Http\Controllers\CalenderController::class, 'index_session'])->name('event.calender.session');
    Route::get('/api/calender/find', [App\Http\Controllers\CalenderController::class, 'find_data'])->name('course.find');
    // END -  Event calender 
    // START - Event Room calender 
    Route::get('/events/room/calender', [App\Http\Controllers\RoomController::class, 'index'])->name('event.room.calender');
    // END - Room Calender
    // START - Event Sessions 
    Route::get('/events/sesssions', [App\Http\Controllers\SessionsController::class, 'index'])->name('event.session.index');
    // END - Sessions
    // START - Event Trainers 
    Route::get('/events/trainers', [App\Http\Controllers\TrainersController::class, 'index'])->name('event.trainers.index');
    // END - Event Trainerscourse-list
    // START - Event Archive 
    // Route::get('/events/archieve',[App\Http\Controllers\ArchiveController::class, 'index'])->name('event.archive.index');
    // END - Event Archive
    // START - People 
    Route::get('/people/find', [App\Http\Controllers\PeopleController::class, 'index'])->name('people.find.index');
    Route::post('/people/find/column', [App\Http\Controllers\PeopleController::class, 'index'])->name('people.column');
    Route::get('/people/delete/{id}', [App\Http\Controllers\PeopleController::class, 'delete'])->name('people.delete');
    Route::post('/people/store', [App\Http\Controllers\PeopleController::class, 'store'])->name('people.store');
    Route::post('api/people/store', [App\Http\Controllers\PeopleController::class, 'store'])->name('api.people.store');
    Route::post('/bulk_sms_filter_form', [App\Http\Controllers\PeopleController::class, 'sms_filter'])->name('bulk_sms_filter_form');
    Route::get('/people/profile/{id}', [App\Http\Controllers\PeopleController::class, 'profile'])->name('people.profile');
    Route::post('/people/profileupdate/{id}', [App\Http\Controllers\PeopleController::class, 'profileUpdate'])->name('people.update');
    Route::delete('/people/profileupdate/{id}', [App\Http\Controllers\PeopleController::class, 'delete'])->name('people.destroy');
    // END - Event Trainers
    // START - Lerner Record 
    Route::get('/people/active/learns', [App\Http\Controllers\LearnerRecord::class, 'index'])->name('people.active.learners.index');
    Route::get('/people/enquirySearch', [App\Http\Controllers\LearnerRecord::class, 'enquiry'])->name('people.enquiry.index');
    // START - People 
    //Start Event Enrollment 
    Route::post('/event/enrollment/course/certificate/issue', [App\Http\Controllers\EnrollmentController::class, 'enrollment_issue'])->name('event.enrollment.issue');
    Route::post('/event/enrollment/course/people/add', [App\Http\Controllers\EnrollmentController::class, 'enrollment_add_people'])->name('event.enrollment.add.people');
  
    
    // End Event Enrollment 
    // START - Lerner Record 
    Route::get('/people/enrolmentSearch', [App\Http\Controllers\EnrollmentController::class, 'index'])->name('people.enrollment.search');
    Route::get('/people/enquirySearch', [App\Http\Controllers\LearnerRecord::class, 'enquiry'])->name('people.enquiry.index');
    // START - Bulk Enrolment 
    Route::get('/people/bulkenrolment', [App\Http\Controllers\EnrollmentController::class, 'bulk'])->name('people.bulk.enrolment');
    // START - People 
    Route::get('/company/avetmissSetting', [App\Http\Controllers\CompanyController::class, 'avetmisssetting'])->name('company.avetmissSetting');
    Route::post('/widgetFunctions/saveAvetmiss', [App\Http\Controllers\CompanyController::class, 'saveAvetmiss'])->name('company.saveAvetmiss');
    //START - Certificate
    Route::get('/company/certificate', [App\Http\Controllers\CompanyController::class, 'certificate'])->name('company.certificate');
    Route::post('/company/certificate/template', [App\Http\Controllers\CompanyController::class, 'template'])->name('certificate.template');
    Route::get('/company/certificate/template/{id}', [App\Http\Controllers\CompanyController::class, 'templateEdit'])->name('certificate.template.edit');
    Route::get('/company/certificate/template/destroy/{id}', [App\Http\Controllers\CompanyController::class, 'templatedestroy'])->name('certificate.template.destroy');
    Route::put('/company/certificate/template/{id}', [App\Http\Controllers\CompanyController::class, 'template_update'])->name('certificate.template.update');
    Route::post('/company/certificate/template/background', [App\Http\Controllers\CompanyController::class, 'background'])->name('certificate.template.background');
    Route::get('certificate/copy/{id}', [App\Http\Controllers\CompanyController::class, 'clone'])->name('certificate.copy');
    Route::post('course/document/email', [App\Http\Controllers\CompanyController::class, 'courseEmail'])->name('course.document.email');
    Route::post('course/certificate/email', [App\Http\Controllers\CompanyController::class, 'courseCertificate'])->name('courses.certificate.email');
    Route::post('course/certificate/document/email', [App\Http\Controllers\CompanyController::class, 'courseCertificateDocument'])->name('submit.course.document.email');
    Route::get('course/certificate/document/destroy/{id}', [App\Http\Controllers\CourseController::class, 'documentdelete'])->name('document.course.upload.delete');
    Route::post('course/edit/infopak/submit', [App\Http\Controllers\CourseController::class, 'emailcontent'])->name('create.infopak.submit');
    Route::post('course/document/email/submit', [App\Http\Controllers\CourseController::class, 'document_template'])->name('update.background.template');
    Route::get('course/certificate/template/email/{id}', [App\Http\Controllers\CourseController::class, 'certificateDocument'])->name('document.template.edit.record');
    Route::post('course/document/email/update', [App\Http\Controllers\CourseController::class, 'template_update'])->name('document.certificate.template.update');
    Route::post('course/associated/update', [App\Http\Controllers\CourseController::class, 'associated_update'])->name('course.associated.update');
    Route::post('course/text/editor/body', [App\Http\Controllers\CourseController::class, 'text_editor'])->name('document.text.editor.body');
    Route::get('/certificate/preview/{id}', [App\Http\Controllers\CourseController::class, 'certifiacate_preview'])->name('certificate.preview');

    //start company
    Route::get('/company/companydoc', [App\Http\Controllers\CompanyController::class, 'companyDoc'])->name('company.document');
    Route::get('/company/info/upload', [App\Http\Controllers\CompanyController::class, 'infoUpload'])->name('document.infopak.upload');
    Route::post('/upload-file', [App\Http\Controllers\CompanyController::class, 'uploadFile'])->name('document.upload.file');
    Route::get('/company/certificate/documrnt/destroy/{id}', [App\Http\Controllers\CompanyController::class, 'documentdelete'])->name('document.upload.delete');
    Route::get('/company/certificate/documrnt/edit/{id}', [App\Http\Controllers\CompanyController::class, 'documentEdit'])->name('document.upload.edit');
    Route::post('/company/certificate/documrnt/update', [App\Http\Controllers\CompanyController::class, 'document_update'])->name('document.upload.update');
    //Start Competency Report
    Route::get('/competencyReport', [App\Http\Controllers\CompanyController::class, 'competencyReport'])->name('company.competency.report');
    Route::post('/competencyReport/edit', [App\Http\Controllers\CompanyController::class, 'competencyReportEdit'])->name('competency.report.background');
    //Start Company Setting //
    Route::get('/companysettings', [App\Http\Controllers\CompanyController::class, 'companysettings'])->name('company.company.setting');
    //Start CQR Report
    Route::get('/CQRreport', [App\Http\Controllers\CompanyController::class, 'CQR'])->name('company.CQR');
    Route::post('/CQRreport/store', [App\Http\Controllers\CQRreportController::class, 'store'])->name('company.CQR.store');
    Route::get('/CQRreporthistory', [App\Http\Controllers\CQRreportController::class, 'index'])->name('company.CQR.index');
    //Start Data Export
    Route::get('/exportXML', [App\Http\Controllers\ExportController::class, 'exportToXml'])->name('dataExport');
    Route::get('/export/xml-file', [App\Http\Controllers\ExportController::class, 'exportToXml'])->name('export.xml');
    Route::get('/export/xls-file', [App\Http\Controllers\ExportController::class, 'exportToXls'])->name('export.xls');
    //start ASQA
    Route::get('/exportASQA', [App\Http\Controllers\ExportController::class, 'exportASQA'])->name('exportASQA');
    Route::post('/export/ASQA', [App\Http\Controllers\ExportController::class, 'ExportStore'])->name('exportASQA.export');
    //Start NAT Files
    Route::get('/process/exportavetmissNew', [App\Http\Controllers\ExportController::class, 'ExportNAT'])->name('exportNAT');
    Route::post('/process/nat/generator', [App\Http\Controllers\ExportController::class, 'exportNATGenerator'])->name('nat.generator');
    Route::get('/api/courseload', [App\Http\Controllers\ExportController::class,'courseLoad'])->name('course.load');
    //Start Survey Setting
    Route::get('/survey/settings', [App\Http\Controllers\ExportController::class, 'exportavetmissNew'])->name('exportavetmissNew');
    //Start User Management
    Route::get('/company/company', [App\Http\Controllers\ExportController::class, 'company'])->name('company');
  // Report
  //Courser Complation
  Route::get('/report/courseCompletion', [App\Http\Controllers\ReportController::class, 'courseCompletion'])->name('course.complation');
  // COURSE UTILISATION
  Route::get('/report/courseUtilisation', [App\Http\Controllers\ReportController::class, 'courseUtilisation'])->name('course.utilisation');
  //DUPLICATED ENROLMENTS
  Route::get('/report/duplicateEnrolment', [App\Http\Controllers\ReportController::class, 'duplicateEnrolment'])->name('duplicate.enrolment');
  // DUPLICATED PERSONS
  Route::get('/report/duplicatePerson', [App\Http\Controllers\ReportController::class, 'duplicatePerson'])->name('duplicate.person');
  // Invoices and Payments
  Route::get('/report/unpaidInvoices', [App\Http\Controllers\ReportController::class, 'unpaidInvoices'])->name('invoice.payment');
  //  POSSIBLE MATCHES
  Route::get('/report/possibleMatch', [App\Http\Controllers\ReportController::class, 'possibleMatch'])->name('possible.dublicates');  
  //  SMS USAGE
  Route::get('/report/smsUsage', [App\Http\Controllers\ReportController::class, 'smsUsage'])->name('sms.usage');  
  // STORAGE DETAILS
  Route::get('/report/storagedetails', [App\Http\Controllers\ReportController::class, 'storagedetails'])->name('storage.details');  
  // TRAINER COMPETENCIES
  Route::get('/report/trainerCompetency', [App\Http\Controllers\ReportController::class, 'trainerCompetency'])->name('trainer.competencies');  
 // Other Api City
  Route::get('/api/city/list', [App\Http\Controllers\ApiController::class, 'cityget'])->name('api.city.list');  
  Route::get('/api/teacher/list', [App\Http\Controllers\ApiController::class, 'teacherget'])->name('api.teacher.list');  
  Route::get('/api/edit/default', [App\Http\Controllers\ApiController::class,'default_get'])->name('api.edit.default');  
  Route::post('/api/edit/default/update', [App\Http\Controllers\ApiController::class,'default_update'])->name('api.edit.default.update');  
  Route::get('/api/course/sessios/list', [App\Http\Controllers\ApiController::class,'sessions_course'])->name('api.course.sessions.list');  
  Route::get('/api/course/trainer/list', [App\Http\Controllers\ApiController::class,'sessions_trainer'])->name('api.course.trainer.get');  
  Route::get('/api/course/assessor/list', [App\Http\Controllers\ApiController::class,'sessions_assessor'])->name('api.course.assessor.get');  
  Route::get('/api/course/get/single', [App\Http\Controllers\ApiController::class,'course_single'])->name('api.course.get');  
  Route::get('/api/course/sessions/trainer/list', [App\Http\Controllers\ApiController::class,'sessions_course_trainer_list'])->name('api.course.trainer.list');  
  Route::get('/api/find/people', [App\Http\Controllers\ApiController::class,'findpeople'])->name('api.people.find');  
 
});
});
