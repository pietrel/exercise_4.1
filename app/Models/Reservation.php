<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Relations;

/**
 * Class Reservation
 * @package App\Models
 * @property int id
 * @property int user_id
 * @property int seat_id
 * @property User user
 * @property Seat seat
 */
class Reservation extends Model
{
    use HasFactory;

    use Relations\BelongsTo\User;
    use Relations\BelongsTo\Seat;

    const ID = 'id';

    const USER_ID = 'user_id';

    const SEAT_ID = 'seat_id';

    const USER = 'user';

    const SEAT = 'seat';
}
