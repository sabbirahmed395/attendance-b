<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Course;
use App\Models\Student;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\CourseResource;
use App\Http\Resources\StudentResource;
use App\Http\Resources\TeacherResource;
use App\Models\ClassSession;
use Illuminate\Http\Resources\Json\JsonResource;

class AttendanceController extends BaseController
{
    public function store(Request $request)
    {

        try {
            DB::transaction(function (&$response) use ($request) {

                $classSession = ClassSession::where('classroom_id', $request->classroom_id)
                                                ->where('date', $request->date);

                if ($classSession->exists()) {
                    $classSessionObject = $classSession->first();
                } else {
                    $classSessionObject = ClassSession::create(['classroom_id' => $request->classroom_id, 'date' => $request->date]);
                }

                $classSessionId = $classSessionObject->id;

                $students = $request->students;
                foreach($students as $student) {
                    $attendance = Attendance::where('class_session_id', $classSessionId)->where('student_id', $student['id']);

                    $studentId = $student['id'];
                    $isPresent = boolval($student['checked']);

                    $data = [
                        'class_session_id' => $classSessionId,
                        'student_id' => $studentId,
                        'is_present' => $isPresent
                    ];

                    if ($attendance->exists()) {
                        $attendance->update($data);
                    } else {
                        Attendance::create($data);
                    }
                }
            });
        } catch (\Illuminate\Database\QueryException $exception) {
            if ($exception->errorInfo[1] === 1062) {
                return response()->json(['message' => 'Attendence are already been registered!'], 403);
            }
            return response()->json(['message' => 'Something went wrong! please try later!'], 500);
        }

        return response()->json(['message' => 'Attendance successful!'], 200);
    }
}
