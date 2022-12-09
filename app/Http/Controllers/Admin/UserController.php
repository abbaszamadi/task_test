<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    
    public function index()
    {
        $users = User::get();
        return Response::CustomResponse(200, '', ['users' => UserResource::collection($users)]);
    }
    
}
