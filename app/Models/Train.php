<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Relations;
use Illuminate\Support\Collection;

/**
 * Class Train
 * @package App\Models
 * @property int id
 * @property string uuid
 * @property string name
 * @property Collection|Car[] cars
 * @property Carbon startAt
 */
class Train extends Model
{
    use HasFactory;

    use Relations\HasMany\Cars;

    const ID = 'id';

    const UUID = 'uuid';

    const NAME = 'name';

    const START_AT = 'start_at';

    const CARS = 'cars';


    protected $fillable = [
        self::NAME,
        self::START_AT,
    ];

    protected $casts = [
        self::ID       => 'int',
        self::START_AT => 'datetime:Y-m-d H:i'
    ];

}
