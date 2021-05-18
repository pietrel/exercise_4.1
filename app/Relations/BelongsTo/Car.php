<?php


namespace App\Relations\BelongsTo;


use App\Models\Car as CarModel;

trait Car
{
    public function car()
    {
        return $this->belongsTo(CarModel::class);
    }

}