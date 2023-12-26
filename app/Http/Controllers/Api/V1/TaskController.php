<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Task;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\TaskResource;

class TaskController extends Controller
{

    public function index()
    {
        return TaskResource::collection(Task::all());
    }

    public function store(StoreTaskRequest $request)
    {
        $task = Task::create($request->validated());
        return $this->success(['task' => new TaskResource($task)]);



    }

    public function show(Task $task)
    {
        return $this->success(['task' => new TaskResource($task)]);

    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task->update($request->validated());

        return $this->success(['task' => new TaskResource($task)]);


    }

    public function destroy(Task $task)
    {
        $task->delete();

        return $this->success();

    }
}
