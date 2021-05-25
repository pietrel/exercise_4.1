<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationRequest;
use App\Messages;
use App\Models\Seat;
use App\Services\SeatReservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{


    public function reserveSeat(ReservationRequest $request)
    {
        $input = $request->validated();

        if ($service = SeatReservation::reserve($input['uuid'])) {
            return response()->json(['success' => true]);

        }
        return response()->json(['success' => false, 'message' => Messages::SEAT_IS_ALREADY_OCCUPIED]);

    }

    public function checkSeat(Request $request, $uuid)
    {
        /** @var Seat $seat */
        if ($seat = SeatReservation::findSeat($uuid)) {
            $response = [
                'vacant' => SeatReservation::hasSeatReservation($seat) ? false : true,
            ];

            if (SeatReservation::hasSeatReservation($seat)) {
                $response['price'] = $seat->price;
            }
            return response()->json($response);
        }
        return response()->json(['message' => 'Not Found!'], 404);
    }
}
