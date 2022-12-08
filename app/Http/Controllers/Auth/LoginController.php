<?php

namespace App\Http\Controllers\Auth;

use App\Services\AuthService;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;

class LoginController extends Controller
{
    
    public function login(LoginRequest $request)
    {
        $data = (new AuthService)->login($request->all());
        return Response::CustomResponse($data['status'], $data['message'], $data['data']);  
    }
}
