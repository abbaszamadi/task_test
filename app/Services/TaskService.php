<?php
namespace App\Services;

use App\Task;
use App\TasksUser;

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



    public function mention($data)
    {
        return TasksUser::firstOrCreate($data);
    }
}