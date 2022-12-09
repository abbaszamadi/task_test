<?php

namespace App\Http\Controllers\Admin;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    
    public function index()
    {
        $tasks = Task::get();

        return Response::CustomResponse(200, '', $tasks);
    }
}
