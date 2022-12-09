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


    public function store(StoreTaskRequest $request)
    {
        $task = (new TaskService)->store($request->all());

        return Response::CustomResponse(201, __('messages.task_created'), new TaskResource($task));
    }




}
