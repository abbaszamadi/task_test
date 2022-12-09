<?php
namespace App\Services;

use App\Task;

class TaskService
{

    public function store($data)
    {
        return Task::create($data);
    }


}