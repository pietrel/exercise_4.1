<?php


namespace App\Relations\HasMany;


use App\Models\Car as CarModel;


trait Cars
{
    public function cars()
    {
        return $this->hasMany(CarModel::class);
    }

}