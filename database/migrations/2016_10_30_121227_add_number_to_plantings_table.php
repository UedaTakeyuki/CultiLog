<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNumberToPlantingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('plantings', function (Blueprint $table) {
            //
            $table->integer('original_number')->nullable();
            $table->integer('current_number')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('plantings', function (Blueprint $table) {
            //
            $table->dropColumn('original_number');
            $table->dropColumn('current_number');
        });
    }
}
