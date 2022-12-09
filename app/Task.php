<?php

namespace App;

use App\User;
use App\TasksUser;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title','user_id', 'description'];


    /**
     * The users that belong to the role.
     */
    public function users()
    {
        return $this->belongsToMany(User::class, TasksUser::class);
    }
    
}
