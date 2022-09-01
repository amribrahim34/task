<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    protected $fillable = [
        'player_secret',
        'computer_secret',
        'guess_string',
        'num_of_guesses',
    ];
}
