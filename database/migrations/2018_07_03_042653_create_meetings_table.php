<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->unsigned();
            $table->integer('admin_id')->nullable();
            $table->string('bap')->nullable();
            $table->string('date')->nullable();
            $table->string('time')->nullable();
            $table->string('place')->nullable();
            $table->integer('state')->nullable();

            $table->timestamps();

            $table->foreign('order_id')
            ->references('id')->on('orders')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migration
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meetings');
    }
}
