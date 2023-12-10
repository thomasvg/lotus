<?php




namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booked extends Model
{
    protected $table = 'booked';
    protected $fillable = ['bookednr', 'line'];
}
