<?php


namespace App\Relations\HasOne;


trait Reservation
{

    public function reservation()
    {
        return $this->hasOne(\App\Models\Reservation::class);
    }

}