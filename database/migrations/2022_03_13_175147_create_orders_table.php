<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('tracking_id');
            $table->double('gross_total');
            $table->double('net_total');
            $table->integer('order_status')->default(0);
            $table->string('order_notes')->nullable();
            $table->integer('payment_status')->default(0);
            $table->string('payment_method');
            $table->string('coupon_code')->nullable();
            $table->double('coupon_discount_amount')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
