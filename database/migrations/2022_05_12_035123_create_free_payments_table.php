<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFreePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('free_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('free_id');
            $table->unsignedBigInteger('user_id');
            $table->string('payment_number');
            $table->bigInteger('billing');
            $table->string('description');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('free_id')->references('id')->on('frees')->onDelete('cascade');
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
        Schema::dropIfExists('free_payments');
    }
}
