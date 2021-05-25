<?php


namespace App\Services;


use App\Models\Reservation;
use App\Models\Seat;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SeatReservation
{

    /**
     * @param $uuid
     * @return Seat|null
     */
    public static function findSeat($uuid)
    {
        /** @var Seat $seat */
        if ($seat = Seat::where(Seat::UUID, $uuid)->first()) {
            return $seat;
        }
        return null;
    }

    /**
     * @param Seat $seat
     * @return bool
     */
    public static function hasSeatReservation(Seat $seat)
    {
        if (is_null($seat->reservation)) {
            return false;
        }
        return true;
    }

    /**
     * @param $uuid
     * @return Seat|null
     */
    public static function getVacantSeat($uuid)
    {
        /** @var Seat $seat */
        if($seat = self::findSeat($uuid)){
            if(self::hasSeatReservation($seat)){
                return null;
            }
            return $seat;
        }
        return null;
    }

    public static function reserve($uuid)
    {
        if ($seat = self::getVacantSeat($uuid)) {
            DB::beginTransaction();

            try {
                $reservation          = new Reservation();
                $reservation->user_id = Auth::user()->id;
                $seat->reservation()->save($reservation);

                DB::commit();
            } catch (Exception $e) {
                DB::rollback();
                return false;
            }

            return true;
        }
        return false;
    }

}