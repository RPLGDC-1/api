<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    use ApiTrait;

    public function profile()
    {
        return $this->sendResponse([
            'token' => Auth::user()->currentAccessToken()->token,
            'user' => Auth::user(),
        ]);
    }
}
