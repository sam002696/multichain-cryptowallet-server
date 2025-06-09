<?php

namespace App\Models;


use MongoDB\Laravel\Eloquent\Model;

class Network extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'networks';

    protected $guarded = [];
}
