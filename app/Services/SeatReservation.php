<?php


namespace App\Services;


use App\Models\Reservation;
use App\Models\Seat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SeatReservation
{

    /**
     * @param $uuid
     * @return Seat|null
     */
    public static function check($uuid): ?Seat
    {
        /** @var Seat $seat */
        if ($seat = Seat::where(Seat::UUID, $uuid)->first()) {
            return is_null($seat->reservation) ? $seat : null;
        }
        return null;
    }

    public static function reserve($uuid)
    {
        if ($seat = self::check($uuid)) {
            DB::beginTransaction();

            try {
                $reservation          = new Reservation();
                $reservation->user_id = Auth::user()->id;
                $seat->reservation()->save($reservation);

                DB::commit();
            } catch (\Exception $e) {
                DB::rollback();
                return false;
            }

            return true;
        }
        return false;
    }

}