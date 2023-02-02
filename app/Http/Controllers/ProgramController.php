<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;
use App\Http\Requests\ProgramRequest;
use Illuminate\Http\Resources\Json\JsonResource;

class ProgramController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programs = Program::query();

        $programs = $programs->orderBy('id', 'desc');

        $programs = $this->_per_page > 0 ? $programs->paginate($this->_per_page) : $programs->get();

        return JsonResource::collection($programs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProgramRequest $request)
    {
        $program = Program::create($request->validated());

        return new JsonResource($program);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function show(Program $program)
    {
        return new JsonResource($program);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function update(ProgramRequest $request, Program $program)
    {
        $program->fill($request->validated());
        $program->save();

        return new JsonResource($program);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function destroy(Program $program)
    {
        $program->delete();

        return response()->json(['message' => "Your requested program has been deleted!"]);
    }

    /**
     * Return all the enrolled cources
     *
     * @param \App\Models\Program $program
     * @return \App\Http\Resources\CourseResource | \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function courses(Program $program)
    {
        $cources = $program->courses;

        return JsonResource::collection($cources);
    }

    /**
     * Return all the enrolled batches
     *
     * @param \App\Models\Program $program
     * @return \App\Http\Resources\CourseResource | \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function batches(Program $program)
    {
        $batches = $program->batches;

        return JsonResource::collection($batches);
    }
}
