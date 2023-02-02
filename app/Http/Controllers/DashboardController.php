<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Batch;
use App\Models\Course;
use App\Models\Program;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Classroom;
use App\Models\Attendance;
use App\Models\ClassSession;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function summaries()
    {
        $data['students'] = Student::get()->count();
        $data['teachers'] = Teacher::get()->count();
        $data['programs'] = Program::get()->count();
        $data['courses'] = Course::get()->count();
        $data['batches'] = Batch::get()->count();
        $data['classrooms'] = Classroom::get()->count();
        $data['sessions'] = ClassSession::get()->count();
        $data['attendances'] = Attendance::get()->count();
        $data['users'] = User::get()->count();

        return response()->json($data);
    }
}
