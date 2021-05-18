<?php

namespace App\Http\Controllers;

use App\Models\Seat;
use App\Services\SeatReservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ReservationController extends Controller
{


    public function reserveSeat(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['message' => 'Not authorized'], 401);
        }
        $validator = Validator::make($request->all(), [
            "uuid" => ['required', 'string', 'exists:seats,uuid']
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Bad request'], 400);
        }

        $input = $validator->validated();

        if ($service = SeatReservation::reserve($input['uuid'])) {
            return response()->json(['success' => true]);

        }
        return response()->json(['success' => false, 'message' => 'seat is alerady occupied']);


    }

    public function checkSeat(Request $request, $uuid)
    {
        /** @var Seat $seat */
        if ($seat = SeatReservation::check($uuid)) {
            $response = [
                'vacant' => is_null($seat->reservation) ? true : false,
            ];

            if (is_null($seat->reservation)) {
                $response['price'] = $seat->price;
            }
            return response()->json($response);
        }
        return response()->json(['message' => 'Not Found!'], 404);
    }
}
