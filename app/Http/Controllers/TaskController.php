<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use App\Services\TaskService;
use Illuminate\Http\Response;
use App\Http\Requests\StoreTaskRequest;

class TaskController extends Controller
{

    
    public function store(StoreTaskRequest $request)
    {
        $data = (new TaskService)->store($request->all());

        return Response::CustomResponse(201, __('messages.task_created'), $data);
    }



}
