<?php

namespace App\Repositories\Buyer;

use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class AuthRepository
{

    public function login($request)
    {
        try {
            $credentials = $request->only(['email', 'password']);

            if (!$token = auth('buyer')->attempt($credentials)) {
                throw new Exception("Email or password is wrong!", 401);
            };
            $jwt = auth('buyer')->payload()->toArray();
            $data = auth('buyer')->user();
            $data['token'] = $token;
            $data['exp_token'] = $jwt['exp'];
            return $data;
        } catch (\Exception $e) {
            throw $e;
            report($e);
            return $e;
        }
    }

    public function me()
    {
        try {
            return auth('buyer')->user();
        } catch (\Exception $e) {
            throw $e;
            report($e);
            return $e;
        }
    }

    public function logout()
    {
        try {
            return auth('buyer')->logout();
        } catch (\Exception $e) {
            throw $e;
            report($e);
            return $e;
        }
    }

    public function refresh()
    {
        try {
            return auth('buyer')->parseToken()->refresh();
        } catch (\Exception $e) {
            throw $e;
            report($e);
            return $e;
        }
    }
}
