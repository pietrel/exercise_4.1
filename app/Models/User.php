<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Relations;
use Illuminate\Support\Collection;

/**
 * Class User
 * @package App\Models
 * @property int id
 * @property string name
 * @property string email
 * @property string password
 * @property string rememberToken
 * @property string emailVerifiedAt
 * @property Collection|Reservation[] reservations
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use Relations\HasMany\Seats;
    use Relations\HasMany\Reservations;

    const ID = 'id';

    const NAME = 'name';

    const EMAIL = 'email';

    const PASSWORD = 'password';

    const REMEMBER_TOKEN = 'remember_token';

    const EMAIL_VERIFIED_AT = 'email_verified_at';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        self::NAME,
        self::EMAIL,
        self::PASSWORD
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        self::PASSWORD,
        self::REMEMBER_TOKEN
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        self::EMAIL_VERIFIED_AT => 'datetime',
    ];
}
