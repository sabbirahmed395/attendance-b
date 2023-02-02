<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
use App\Http\Resources\CourseResource;
use App\Http\Resources\StudentResource;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \App\Http\Resources\StudentResource | \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index():\App\Http\Resources\StudentResource | \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $students = Student::with('batch', 'batch.program');

        $students = $students->orderBy('id', 'desc');

        $students = $this->_per_page > 0 ? $students->paginate($this->_per_page) : $students->get();

        return StudentResource::collection($students);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        $students = Student::create($request->validated());

        return new StudentResource($students);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function show(Student $student)
    {
        if (request()->has('with')) {
            if (request()->with === 'courses') {
                $batchId = $student->batch->id;
                $classrooms = Classroom::with('course')->where('batch_id', $batchId)->get();
                // $student->load("enrolls");
                $student->enrolls = $classrooms;
            }
        }
        $student->load('batch');

        return new JsonResource($student);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequest $request, Student $student)
    {
        $student->fill($request->validated());
        $student->save();

        return new StudentResource($student);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return response()->json(['message' => "Your requested student has been deleted!"]);
    }

    /**
     * Return all the enrolled cources
     *
     * @param \App\Models\Student $student
     * @return \App\Http\Resources\CourseResource | \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function cources(Student $student):\App\Http\Resources\CourseResource | \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $cources = $student->enrolls;

        return CourseResource::collection($cources);
    }

    /**
     * Return all the enrolled cources
     *
     * @param \App\Models\Student $student
     * @param \App\Models\Course $course
     * @return \App\Http\Resources\CourseResource | \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function course_enroll(Student $student, Course $course):\App\Http\Resources\CourseResource | \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $cources = $student->enrolls->attach($course, ['meta' => json_encode(['type' => 'enroll']), 'associated_at' => \Carbon\Carbon::now()]);

        return CourseResource::collection($cources);
    }
}
