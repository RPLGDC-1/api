<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use ApiTrait;

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
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

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'type' => 'user',
            'password' => bcrypt($request->password),
        ]);
        
        $data['token'] = $user->createToken(env("APP_NAME"))->plainTextToken;
        $data['user'] = $user;

        return $this->sendResponse($data);
    }
}
