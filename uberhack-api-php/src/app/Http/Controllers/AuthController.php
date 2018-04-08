<?php

namespace App\Http\Controllers;

use App\Http\Resources\User as UserResource;
use Auth;

class AuthController extends Controller
{
    /**
     * Get currently authenticated user
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function user()
    {
        return UserResource::make(Auth::user())->response();
    }
}
