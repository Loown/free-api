<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class AdminLoginController extends Controller
{
    public function __invoke(LoginRequest $request)
    {
        if (!Auth::attempt($request->only(['email', 'password']))) {
            return Response::json('Email ou mot de passe incorrect.', 400);
        }

        if (!Auth::user()->hasRole('admin')) {
            return Response::json('Vous devez être admin.', JsonResponse::HTTP_FORBIDDEN);
        }

        Auth::user()->load(['roles']);

        return Response::json([
            'token' => Auth::user()->createToken('free-4-motion')->plainTextToken,
            'user' => Auth::user(),
        ]);
    }
}
