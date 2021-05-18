<?php


namespace App\Relations\BelongsTo;


use App\Models\User as UserModel;

trait User
{
    public function user()
    {
        return $this->belongsTo(UserModel::class);
    }

}