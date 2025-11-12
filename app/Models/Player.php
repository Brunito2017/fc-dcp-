<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $table = 'player';

    protected $fillable = [
        'external_id',
        'name',
        'position',
        'club',
        'nation',
        'rating',
        'is_active',
    ];
}