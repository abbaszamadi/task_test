<?php

namespace App\Http\Controllers\Admin;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\TaskResource;

class TaskController extends Controller
{
    
    public function index()
    {
        $tasks = Task::get();
        
        return Response::CustomResponse(200, '', ['tasks' => TaskResource::collection($tasks)]);
    }
    
}
