<?php


namespace App\Relations\HasMany;


use App\Models\Reservation;

trait Reservations
{

    public function reservations(){
        return $this->hasMany(Reservation::class);
    }

}