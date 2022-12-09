<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use App\Services\TaskService;
use Illuminate\Http\Response;
use App\Http\Resources\TaskResource;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreTaskRequest;

class TaskController extends Controller
{


    /**
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index()
    {
        $tasks = Task::where('user_id', auth()->user()->id)->get();
        return Response::CustomResponse(200, '', TaskResource::collection($tasks));
    }

    /**
    * Store a newly created resource in storage.
    * @param StoreTaskRequest $request 
    * @return Response
    */
    public function store(StoreTaskRequest $request)
    {
        $task = (new TaskService)->store($request->all());

        return Response::CustomResponse(201, __('messages.task_created'), new TaskResource($task));
    }



    /**
    * Remove the specified resource from storage.
    *
    * @param  Task  $task
    * @return Response
    */
    public function destroy(Task $task)
    {
        if (Gate::allows('destroy-task', $task)) {

            $task->delete();
            return Response::CustomResponse(200, __('task_deleted'), []);
        }
        return Response::CustomResponse(403, __('messages.task_deny_delete'), []);

    }


}
