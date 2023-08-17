<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use ApiTrait;

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if(!Auth::attempt(['email' => $request->email, 'password' => $request->password, 'type' => 'user'])) {
            return $this->sendResponse(['message' => 'Email or password is wrong!'], 401);
        }

        $user = Auth::user();
        $data['token'] = $user->createToken(env("APP_NAME"))->plainTextToken;
        $data['user'] = $user;

        return $this->sendResponse($data);
    }
}
