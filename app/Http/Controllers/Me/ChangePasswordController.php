<?php

namespace App\Http\Controllers\Me;

use App\Http\Controllers\Controller;
use App\Http\Requests\Me\ChangePasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function __invoke(ChangePasswordRequest $request)
    {
        $user = Auth::user();

        if (!Hash::check($request->get('current_password'), $user->password)) {
            return $this->error('Mot de passe incorrect.');
        }

        $user->password = Hash::make($request->get('new_password'));
        $user->save();

        return $this->success();
    }
}
