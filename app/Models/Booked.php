<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booked extends Model
{
    use HasFactory;

    // The table associated with the model.
    protected $table = 'booked';

    // The attributes that are mass assignable.
    protected $fillable = [
        'bookednr',
        'line',
    ];
}
