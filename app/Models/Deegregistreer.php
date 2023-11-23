<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deegregistreer extends Model
{
    protected $table = 'deegregistreer';
    protected $fillable = ['place', 'placenumber', 'weight', 'bak'];
    use HasFactory;
}
