<?php

namespace App\Http\Controllers\Vehicle;

use App\Http\Controllers\Controller;
use App\Http\Requests\Vehicle\UpdateRequest;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Vehicle $vehicle)
    {
        foreach($request->safe() as $key => $value) {
            $vehicle[$key] = $value;
        }

        $vehicle->save();

        return Response::json($vehicle);
    }
}
