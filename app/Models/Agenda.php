<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Agenda extends Model
{
    protected $fillable = ['title', 'datefrom','dateto'];
    use HasFactory;
}
