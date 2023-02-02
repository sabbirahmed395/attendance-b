<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Http\Resources\CourseResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \App\Http\Resources\UserResource | \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index():\App\Http\Resources\UserResource | \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $users = User::query();

        $users = $users->orderBy('id', 'desc');

        $users = $this->_per_page > 0 ? $users->paginate($this->_per_page) : $users->get();

        return UserResource::collection($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = User::create($request->validated());

        if (request()->has('teacher_id')) {
            $teacher = Teacher::find(request()->teacher_id);
            $teacher->fill(['user_id' => $user->id]);
            $teacher->save();
        }

        return new UserResource($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function show(User $user)
    {
        return new JsonResource($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        $user->fill($request->validated());
        $user->save();

        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return response()->json(['message' => "Your requested user has been deleted!"]);
    }

    /**
     * Return all the enrolled cources
     *
     * @param \App\Models\User $user
     * @return \App\Http\Resources\CourseResource | \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function cources(User $user):\App\Http\Resources\CourseResource | \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $cources = $user->enrolls;

        return CourseResource::collection($cources);
    }

    /**
     * Return all the enrolled cources
     *
     * @param \App\Models\User $user
     * @param \App\Models\Course $course
     * @return \App\Http\Resources\CourseResource | \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function course_enroll(User $user, Course $course):\App\Http\Resources\CourseResource | \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $cources = $user->enrolls->attach($course, ['meta' => json_encode(['type' => 'enroll']), 'associated_at' => \Carbon\Carbon::now()]);

        return CourseResource::collection($cources);
    }
}
