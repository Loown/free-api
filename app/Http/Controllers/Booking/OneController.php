<?php

namespace App\Http\Controllers\Booking;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class OneController extends Controller
{
    public function __invoke(Request $request, Booking $booking)
    {
        return Response::json($booking);
    }
}
