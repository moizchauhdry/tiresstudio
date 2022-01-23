<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('sku');
            $table->string('upc');
            $table->string('sku_type');
            $table->string('title');
            $table->unsignedBigInteger('brand_id')->nullable();
            // Properties
            $table->string('model')->nullable();
            $table->string('offset')->nullable();
            $table->string('bolt_pattern')->nullable();
            $table->string('finish_code')->nullable();
            $table->string('finish')->nullable();
            $table->string('width')->nullable();
            $table->string('diameter')->nullable();
            $table->string('centerbore')->nullable();
            $table->string('wheel_diameter')->nullable();
            // Status
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('products');
    }
}
