<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Relations;

/**
 * Class Seat
 * @package App\Models
 * @property int id
 * @property int uuid
 * @property int car_id
 * @property float price
 * @property string name
 * @property string type
 * @property string rank
 * @property Reservation reservation
 */
class Seat extends Model
{
    use HasFactory;

    use Relations\BelongsTo\Car;
    use Relations\HasOne\Reservation;

    const ID = 'id';

    const UUID = 'uuid';

    const CAR_ID = 'car_id';

    const NAME = 'name';

    const TYPE = 'type';

    const PRICE = 'price';

    const RANK = 'rank';

    protected $casts = [
        self::ID     => 'int',
        self::CAR_ID => 'int',
        self::PRICE  => 'float',
        self::RANK   => 'int'
    ];

    protected $visible = [
        self::NAME,
        self::TYPE,
        self::RANK,
        self::UUID,
    ];
}
