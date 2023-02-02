<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Requests\TeacherRequest;
use App\Http\Resources\CourseResource;
use App\Http\Resources\TeacherResource;
use Illuminate\Http\Resources\Json\JsonResource;

class TeacherController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \App\Http\Resources\TeacherResource | \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index():\App\Http\Resources\TeacherResource | \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $teachers = Teacher::query();
        $teachers = $teachers->orderBy('id', 'desc');

        $teachers = $this->_per_page > 0 ? $teachers->paginate($this->_per_page) : $teachers->get();

        // $teachers->map(function($teacher) {
        //     if (!is_null($teacher->user_id)) {
        //         return $teacher->user;
        //     }

        //     return $teacher->user = null;
        // });

        return TeacherResource::collection($teachers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Request\TeacherRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeacherRequest $request)
    {
        $teacher = Teacher::create($request->validated());

        return new TeacherResource($teacher);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function show(Teacher $teacher):\Illuminate\Http\Resources\Json\JsonResource
    {
        if (request()->has('with')) {
            if (request()->with === 'courses') {
                $teacher->load("courses");
            }
        }

        if ($teacher->user_id) {
            $teacher->user = User::find($teacher->user_id);
        }

        return new JsonResource($teacher);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Request\TeacherRequest $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(TeacherRequest $request, Teacher $teacher)
    {
        $teacher->fill($request->validated());
        $teacher->save();

        if ($request->has('course_id')) {
            $courses = Course::whereIn('id', $request->course_id)->get();
            $teacher->courses()->sync($courses);
        }

        return new TeacherResource($teacher);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();

        return response()->json(['message' => "Your requested teacher has been deleted!"]);
    }

    /**
     * Return all the enrolled cources
     *
     * @param \App\Models\Teacher $teacher
     * @return \App\Http\Resources\CourseResource | \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function cources(Teacher $teacher):\App\Http\Resources\CourseResource | \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $cources = $teacher->enrolls;

        return CourseResource::collection($cources);
    }

    /**
     * Return all the enrolled cources
     *
     * @param \App\Models\Teacher $teacher
     * @param \App\Models\Course $course
     * @return \App\Http\Resources\CourseResource | \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function course_assign(Teacher $teacher, Course $course):\App\Http\Resources\CourseResource | \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $cources = $teacher->enrolls->attach($course, ['meta' => json_encode(['type' => 'enroll']), 'associated_at' => \Carbon\Carbon::now()]);

        return CourseResource::collection($cources);
    }
}
