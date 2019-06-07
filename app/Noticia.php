<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Events\NotiCreated;

class Noticia extends Model
{
    protected $guarded = [];


    protected $dispatchesEvents = [
        'created' => NotiCreated::class
    ];
}
