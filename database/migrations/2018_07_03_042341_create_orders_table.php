<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id')->unsigned();
            $table->string('offer_letter')->nullable();
            $table->string('dp_invoice')->nullable();
            $table->string('transfer_proof')->nullable();
            $table->string('letter_of_request')->nullable();
            $table->string('companion_letter')->nullable();
            $table->string('spk')->nullable();
            $table->integer('state')->nullable();
            $table->string('state_offer')->nullable();
            $table->string('contract')->nullable();
            $table->integer('admin_id');

            $table->timestamps();

            $table->foreign('client_id')
            ->references('id')->on('clients')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
