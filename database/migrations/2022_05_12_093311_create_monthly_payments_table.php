<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonthlyPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthly_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('month_id');
            $table->unsignedBigInteger('monthly_id');
            $table->bigInteger('month_bill');
            $table->string('payment_number')->nullable();
            $table->string('description')->nullable();
            $table->date('payment_date')->nullable();
            $table->boolean('status')->default(false);

            $table->foreign('user_id')->references('id')->on('users')->nullOnDelete();
            $table->foreign('month_id')->references('id')->on('months')->onDelete('cascade');
            $table->foreign('monthly_id')->references('id')->on('monthlies')->onDelete('cascade');
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
        Schema::dropIfExists('monthly_payments');
    }
}
