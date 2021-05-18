<?php


namespace App\Relations\BelongsTo;


use App\Models\Seat as SeatModel;

trait Seat
{
    public function seat()
    {
        return $this->belongsTo(SeatModel::class);
    }

}