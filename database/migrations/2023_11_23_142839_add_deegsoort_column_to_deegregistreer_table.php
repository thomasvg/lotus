<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeegsoortColumnToDeegregistreerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('deegregistreer', function (Blueprint $table) {
            $table->string('deegsoort')->after('placenumber');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('deegregistreer', function (Blueprint $table) {
            $table->dropColumn('deegsoort');
        });
    }
}