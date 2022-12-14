<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;

class RegisterController extends Controller
{
    public function __invoke(RegisterRequest $request)
    {
        $user = new User();
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->save();

        if (Auth::attempt($request->only(['email', 'password']))) {
            return Response::json([
                'token' => Auth::user()->createToken('free-4-motion')->plainTextToken,
                'user' => Auth::user(),
            ]);
        }

        return Response::json('Une erreur a eu lieu avec la création du compte.', 400);
    }
}
