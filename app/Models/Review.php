<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'client_name',
        'client_status',
        'text',
        'rating',
        'photo',
        'is_moderated'
    ];
}
