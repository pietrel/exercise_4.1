<?php

namespace App\Http\Controllers;

use App\Models\Train;
use Illuminate\Http\Request;

class TrainController extends Controller
{
    public function index(Request $request)
    {
        $trains = Train::where(Train::START_AT, '>', now())->get();
        if ($trains) {
            return response()->json($trains);
        }
        return response()->json(['message' => 'Not Found!'], 404);
    }

    /**
     * @param Request $request
     * @param string $uuid
     * @return \Illuminate\Http\JsonResponse
     */
    public function get(Request $request, $uuid)
    {
        /** @var Train $train */
        if ($train = Train::where(Train::UUID, $uuid)->with(Train::CARS)->first()) {
            return response()->json($train);
        }
        return response()->json(['message' => 'Not Found!'], 404);
    }
}
