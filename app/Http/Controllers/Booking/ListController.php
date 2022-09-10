<?php

namespace App\Http\Controllers\Booking;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ListController extends Controller
{
    public function __invoke(Request $request)
    {
        return Response::json(Booking::all());
    }
}
