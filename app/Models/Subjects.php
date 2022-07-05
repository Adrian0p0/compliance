<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{
    use HasFactory;

    protected $fillable = [
        'name-ro',
        'name-de',
        'name-en',
        'description-ro',
        'description-en',
        'description-de',
    ];
}
