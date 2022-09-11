<?php

namespace App\Http\Controllers\Me;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class ProfileController extends Controller
{
    public function __invoke()
    {
        Auth::user()->load(['roles']);
        return Response::json(Auth::user());
    }
}
