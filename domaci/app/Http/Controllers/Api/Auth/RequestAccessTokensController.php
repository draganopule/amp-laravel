<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RequestAccessTokensController extends Controller
{
    public function getAccessToken(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        $token = auth()->attempt($credentials);

        if(!$token) {
            abort(401, "Invalid credentials");
        }

        return response()->json([
            "access_token" => $token,
            "token_type" => "bearer",
            "expires_in" => 1800
        ]);
    }
}
