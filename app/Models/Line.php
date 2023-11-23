<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Line extends Model
{
    // Define the table name and primary key
    protected $table = 'lines';
    protected $primaryKey = 'id';

    // Define the fillable fields
    protected $fillable = [
        // List of column names that can be filled through mass assignment
    ];
}
