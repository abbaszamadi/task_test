<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterUserRequest;
use App\Services\AuthService;
use Illuminate\Http\Response;

class RegisterController extends Controller
{
    

    public function register(RegisterUserRequest $request)
    {
        $data = (new AuthService)->register($request->all());
        return Response::customResponse(201, __('messages.user_registered'), $data);
    }
}
