<?php


namespace App\Relations\BelongsTo;

use App\Models\Train as TrainModel;

trait Train
{
    public function train()
    {
        return $this->belongsTo(TrainModel::class);
    }

}