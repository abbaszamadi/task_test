<?php
namespace App\Services;

use App\User;


class AuthService
{


    public function register($data)
    {

        $data['password'] = bcrypt($data['password']);
        $user   = User::create($data);
        $token  =  $user->createToken('sarmayex')->accessToken;
        return ['token' => $token];
    }


    public function login($data)
    {

        if (auth()->attempt($data)) {
            $token = auth()->user()->createToken('LaravelAuthApp')->accessToken;
            return [
                'status'    => 200,
                'message'   => __('messages.login_success'),
                'data' => ['token' => $token]
            ];
        } else {
            return [
                'status'    => 401,
                'message'   => __('messages.login_failed'),
                'data'      => []
            ];
        }
    }
}