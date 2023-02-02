<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use Illuminate\Http\Request;
use App\Http\Requests\BatchRequest;
use App\Http\Resources\StudentResource;
use Illuminate\Http\Resources\Json\JsonResource;

class BatchController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batches = Batch::with('program');

        $batches = $batches->orderBy('batch_no', 'desc');

        $batches = $this->_per_page > 0 ? $batches->paginate($this->_per_page) : $batches->get();

        return JsonResource::collection($batches);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BatchRequest $request)
    {
        $batch = Batch::create($request->validated());

        return new JsonResource($batch);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function show(Batch $batch)
    {
        return new JsonResource($batch);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function update(BatchRequest $request, Batch $batch)
    {
        $batch->fill($request->validated());
        $batch->save();

        return new JsonResource($batch);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Batch $batch)
    {
        $batch->delete();

        return response()->json(['message' => "Your requested batch has been deleted!"]);
    }

    public function students(Batch $batch)
    {
        $students = $batch->students;

        return StudentResource::collection($students);
    }
}
