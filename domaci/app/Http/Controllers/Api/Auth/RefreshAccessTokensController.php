<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RefreshAccessTokensController extends Controller
{
    public function RefreshAccessToken()
    {
        $token = auth()->refresh();

        return response()->json([
            "access_token" => $token,
            "token_type" => "bearer",
            "expires_in" => auth()->factory()->getTTL() *60
        ]);
    }
}
