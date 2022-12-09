<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TasksUser extends Model
{
    protected $fillable = ['user_id', 'task_id'];
}
