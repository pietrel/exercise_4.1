<?php

use App\Models\Train;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    /** @var \App\Models\Seat $seat */
    $seat = \App\Models\Seat::find(4);
    dd($seat->reservation->toArray());
})->purpose('Display an inspiring quote');
