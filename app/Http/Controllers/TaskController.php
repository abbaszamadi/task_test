<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use App\Services\TaskService;
use Illuminate\Http\Response;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Resources\TaskResource;

class TaskController extends Controller
{


    public function index()
    {
        $tasks = Task::where('user_id', auth()->user()->id)->get();
        return Response::CustomResponse(200, '', $tasks);
    }

    public function store(StoreTaskRequest $request)
    {
        $task = (new TaskService)->store($request->all());

        return Response::CustomResponse(201, __('messages.task_created'), new TaskResource($task));
    }




}
