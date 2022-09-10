<?php

namespace App\Http\Controllers\Vehicle;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ListController extends Controller
{
    public function __invoke()
    {
        return Response::json(Vehicle::all());
    }
}
