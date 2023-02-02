<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\ClassSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ClassroomRequest;
use Illuminate\Http\Resources\Json\JsonResource;

class ClassroomController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classrooms = Classroom::with('batch', 'course', 'course.program');

        $classrooms = $classrooms->orderBy('id', 'desc');

        $classrooms = $this->_per_page > 0 ? $classrooms->paginate($this->_per_page) : $classrooms->get();

        return JsonResource::collection($classrooms);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClassroomRequest $request)
    {
        try {
            $classroom = Classroom::create($request->validated());

            return new JsonResource($classroom);
        } catch (\Illuminate\Database\QueryException $exception) {
            if ($exception->errorInfo[1] === 1062) {
                return response()->json(['message' => 'Classroom already exists!'], 400);
            }
            return response()->json(['message' => 'Something went wrong! please try later!'], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Classroom  $classRoom
     * @return \Illuminate\Http\Response
     */
    public function show(Classroom $classroom)
    {
        return new JsonResource($classroom);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Classroom  $classRoom
     * @return \Illuminate\Http\Response
     */
    public function update(ClassroomRequest $request, Classroom $classroom)
    {
        $classroom->fill($request->validated());
        $classroom->save();

        return new JsonResource($classroom);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classroom $classroom)
    {
        $classroom->delete();

        return response()->json(['message' => "Your requested classroom has been deleted!"]);
    }

    public function class_sessions(Classroom $classroom)
    {

        $attendanceQuery = "SELECT `students`.`student_id`, `class_sessions`.`date`, `attendances`.`is_present` FROM `class_sessions`
        JOIN `attendances` ON `attendances`.`class_session_id` = `class_sessions`.`id`
        JOIN `students` ON `students`.`id` = `attendances`.`student_id`
        where `class_sessions`.`classroom_id` = '".$classroom->id ."' ORDER BY `class_sessions`.`date` ASC";

        $attendanceResults = DB::select( DB::raw($attendanceQuery ) );

        $studentIds = [];
        $data = [];
        foreach($attendanceResults as $result) {
            $key = str_replace('-','_',strval($result->date));
            $data['attendance'][$result->student_id][$key] = $result->is_present;
            $studentIds[$result->student_id] = 0;
        }
        $data['students'] = array_keys($studentIds);

        $dateQuery = "SELECT `class_sessions`.`date` FROM `class_sessions` where `class_sessions`.`classroom_id` = '".$classroom->id ."' ORDER BY `class_sessions`.`date` ASC";

        $dateResults = DB::select( DB::raw($dateQuery ) );

        foreach($dateResults as $result) {
            $data['date'][] = $result->date;
        }

        $classSessionCountQuery = "SELECT COUNT(`id`) as `count` FROM `class_sessions` where `class_sessions`.`classroom_id` = '".$classroom->id ."'";

        $classSessionCountResults = DB::select( DB::raw($classSessionCountQuery ) );

        $data['total_class_session'][] = $classSessionCountResults[0]->count;

        $totalPresentCountQuery = "SELECT `attendances`.`student_id`, `students`.`student_id` as `code`, count(`attendances`.`is_present`) as `present` FROM `attendances`
        JOIN `class_sessions` ON `class_sessions`.`id` = `attendances`.`class_session_id`
        JOIN `students` ON `students`.`id` = `attendances`.`student_id`
        where `attendances`.`is_present`=true and `class_sessions`.`classroom_id` = $classroom->id group by `students`.`student_id`, `attendances`.`student_id`";

        $totalPresentCountResults = DB::select( DB::raw($totalPresentCountQuery ) );

        $data['marks'] = [];
        foreach($totalPresentCountResults as $totalPresent) {
            $data['marks'][$totalPresent->code] = [
                'student_id' => $totalPresent->code,
                'attendance' => $totalPresent->present,
                'mark' => round((10/$classSessionCountResults[0]->count)*$totalPresent->present),
                'percentage' => round((100/$classSessionCountResults[0]->count)*$totalPresent->present, 2)
            ];
        }

        // dump($totalPresentCountResults);

        // $classroom->load('class_sessions', 'class_sessions.attendances', 'class_sessions.attendances.student');

        return JsonResource::collection($data);
    }
}
