<?php

namespace App\Http\Controllers\Vehicle;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class OneController extends Controller
{
    public function __invoke(Vehicle $vehicle)
    {
        return Response::json($vehicle);
    }
}
