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
}