<?php


namespace App\Relations\HasMany;


use App\Models\Seat;

trait Seats
{
    public function seats()
    {
        return $this->hasMany(Seat::class);
    }
}