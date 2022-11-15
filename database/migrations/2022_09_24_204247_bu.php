<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Bu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('bu', function (Blueprint $table) {
                $table->increments('id');
                $table->string('bu_name');
                $table->string('bu_price');
                $table->string('bu_rant');
                $table->string('bu_square');
                $table->string('bu_type');
                $table->string('bu_small_dis');
                $table->string('bu_meta');
                $table->string('bu_langtude');
                $table->string('bu_latetude');
                $table->longText('bu_large_dis');
                $table->string('bu_status');
                $table->unsignedBigInteger('user_id');
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->integer('bu_rooms');
                $table->string('bu_place');
                $table->string('photo');
                $table->timestamps();
            });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
