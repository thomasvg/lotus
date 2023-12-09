<?php



use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class booked extends Migration
{
    public function up()
    {
        Schema::create('booked', function (Blueprint $table) {
            $table->id();
            $table->integer('bookednr');
            $table->integer('line');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('booked');
    }
}




