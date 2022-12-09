<?php

namespace App\Http\Controllers\Admin;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\TaskResource;
use App\Http\Requests\UpdateTaskRequest;
use App\Services\TaskService;

class TaskController extends Controller
{
    
    public function index()
    {
        $tasks = Task::get();

        return Response::CustomResponse(200, '', ['tasks' => TaskResource::collection($tasks)]);
    }


    public function update(UpdateTaskRequest $request, Task $task)
    {
        (new TaskService)->update($task, $request->all());
        return Response::CustomResponse(200, __('messages.task_updated'), []);
    }
    
}
