<?php
namespace App\Services;

use App\Task;

class TaskService
{

    public function store($data)
    {
        $task = Task::create($data);
        $task->users()->attach(auth()->user()->id);
        return $task;
    }

    public function update($task, $data)
    {
        return $task->update($data);
    }


}