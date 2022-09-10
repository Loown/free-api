<?php

namespace App\Http\Controllers\Vehicle;

use App\Http\Controllers\Controller;
use App\Http\Requests\Vehicle\CreateRequest;
use App\Models\Vehicle;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class CreateController extends Controller
{
    public function __invoke(CreateRequest $request)
    {
        $vehicle = new Vehicle();

        foreach($request->safe() as $key => $value) {
            $vehicle[$key] = $value;
        }

        $vehicle->save();

        return Response::json($vehicle, JsonResponse::HTTP_CREATED);
    }
}
