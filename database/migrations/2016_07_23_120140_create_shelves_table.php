<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShelvesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shelves', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('unit_id')->unsigned();   // 追加
            $table->string('name');
            $table->timestamps();
            
            // 外部キーを追加
            $table->foreign('unit_id')
                        ->references('id')
                        ->on('units');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('shelves');
    }
}
