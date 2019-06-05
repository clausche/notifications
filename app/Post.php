<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Events\PostCreated;

class Post extends Model
{

    protected $guarded = [];


    protected $fillable = [
        'description', 'body',
    ];

    protected $dispatchesEvents = [
        'created' => PostCreated::class,
    ];
}
