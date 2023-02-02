<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use App\Http\Resources\CourseResource;
use App\Http\Resources\StudentResource;
use App\Http\Resources\TeacherResource;
use App\Models\Course;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \App\Http\Resources\CourseResource | \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index():\App\Http\Resources\CourseResource | \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $courses = Course::query();

        $courses = $courses->orderBy('id', 'desc');

        $courses = $this->_per_page > 0 ? $courses->paginate($this->_per_page) : $courses->get();

        return CourseResource::collection($courses);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {
        $course = Course::create($request->validated());

        return new CourseResource($course);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function show(Course $course)
    {
        if (request()->has('with')) {
            if (stristr(request()->with, ",")) {
                $with = explode(",", request()->with);
                foreach($with as $w) {
                    $course->load($w);
                }
            }
        }

        return new JsonResource($course);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(CourseRequest $request, Course $course)
    {
        $course->fill($request->validated());
        $course->save();

        return new CourseResource($course);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();

        return response()->json(['message' => "Your requested course has been deleted!"]);
    }

    /**
     * Return teachers enrolled in particular course
     *
     * @param \App\Models\Course $course
     * @return \App\Http\Resources\TeacherResource | \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function teachers(Course $course):\App\Http\Resources\TeacherResource | \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $teachers = $course->teachers;

        return TeacherResource::collection($teachers);
    }

    /**
     * Return students enrolled in particular course
     *
     * @param \App\Models\Course $course
     * @return \App\Http\Resources\StudentResource | \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function students(Course $course):\App\Http\Resources\StudentResource | \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $course->load(['students' => function($query) {
            return $query->where();
        }]);
        $students = $course->students;

        $request = request();
        // $course->load(['attendance' => function($query) use ($request, $course) {
        //     $query->where('course_id');
        // }]);

        return StudentResource::collection($students);
    }

    public function classrooms(Course $course)
    {
        $classrooms = $course->classrooms;

        return JsonResource::collection($classrooms);
    }
}
