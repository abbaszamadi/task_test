<?php

namespace App\Http\Controllers\Admin;

use App\Task;
use App\User;
use Illuminate\Http\Request;
use App\Services\TaskService;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\TaskResource;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Requests\MentionAdminReqeust;
use League\CommonMark\Extension\Mention\Mention;

class TaskController extends Controller
{
    
    /**
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index()
    {
        $tasks = Task::get();

        return Response::CustomResponse(200, '', ['tasks' => TaskResource::collection($tasks)]);
    }



    /**
    * Update the specified resource in storage.
    *
    * @param UpdateTaskRequest $request
    * @param  Task  $task
    * @return Response
    */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        (new TaskService)->update($task, $request->all());
        return Response::CustomResponse(200, __('messages.task_updated'), []);
    }



    /**
    * Remove the specified resource from storage.
    *
    * @param  Task  $task
    * @return Response
    */
    public function destroy(Task $task)
    {
        $task->delete();
        return Response::CustomResponse(200, __('messages.task_deleted'), []);
    }
    


    /**
    * mention admin(user that logged in) to a task
    *
    * @param  MentionAdminReqeust  $request
    * @return Response
    */
    public function mention(MentionAdminReqeust $request)
    {
        (new TaskService)->mention(['task_id' => $request->task_id, 'user_id' => auth()->user()->id]);
        return Response::CustomResponse(201, __('messages.task_mentioned'), []);
    }
}
