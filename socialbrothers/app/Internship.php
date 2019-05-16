<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{
    protected $fillable = [
        'intern',
        'assignment',
        'start',
        'end'
    ];
}
