<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('api')->get('/user', function (Request $request) {
    auth()->user();
    return $request->user();
});

Route::post('auth/login', [LoginController::class, 'login']);

Route::group(['middleware' => ['api', 'auth']], function ($router) {

    Route::post('/auth/logout', [LoginController::class, 'logout']);
    Route::post('/auth/refresh', [LoginController::class, 'refresh']);

    Route::get('/programs/{program}/batches', [ProgramController::class, 'batches']);
    Route::get('/programs/{program}/courses', [ProgramController::class, 'courses']);

    Route::get('/courses/{course}/teachers', [CourseController::class, 'teachers']);
    Route::get('/courses/{course}/students', [CourseController::class, 'students']);

    Route::post('/teachers/{teacher}/courses', [TeacherController::class, 'courses']);
    Route::post('/teachers/{teacher}/courses/{course}/assign', [TeacherController::class, 'course_assign']);

    Route::post('/students/{student}/courses', [StudentController::class, 'courses']);
    Route::post('/students/{student}/courses/{course}/enroll', [StudentController::class, 'course_enroll']);

    Route::post('/attendances/create', [AttendanceController::class, 'store']);

    Route::get('/courses/{course}/classrooms', [CourseController::class, 'classrooms']);

    Route::get('/batches/{batch}/students', [BatchController::class, 'students']);

    Route::get('/classrooms/{classroom}/class_sessions', [ClassroomController::class, 'class_sessions']);

    Route::get('/dashboard/summaries', [DashboardController::class, 'summaries']);

    Route::apiResources([
        'programs' => ProgramController::class,
        'courses' => CourseController::class,
        'teachers' => TeacherController::class,
        'students' => StudentController::class,
        'users' => UserController::class,
        'batches' => BatchController::class,
        'classrooms' => ClassroomController::class,
    ]);

});
