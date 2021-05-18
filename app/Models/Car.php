<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Relations;

/**
 * Class Car
 * @package App\Models
 * @property int id
 * @property string name
 * @property int train_id
 * @property Train train
 */
class Car extends Model
{
    use HasFactory;

    use Relations\BelongsTo\Train;
    use Relations\HasMany\Seats;

    const ID = 'id';

    const NAME = 'name';

    const TRAIN_ID = 'train_id';

    const TRAIN = 'train';

    const SEATS = 'seats';

    protected $with = [self::SEATS];

    protected $fillable = [
        self::NAME
    ];

    protected $casts = [
        self::TRAIN_ID => 'int',
    ];

}
