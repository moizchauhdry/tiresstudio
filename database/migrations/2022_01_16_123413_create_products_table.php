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
            $table->string('upc')->nullable();
            $table->string('sku_type');
            $table->string('title');
            $table->unsignedBigInteger('brand_id')->nullable();
            // Properties
            $table->string('model')->nullable();
            $table->string('offset')->nullable();
            $table->string('boltPattern')->nullable();
            $table->string('finishCode')->nullable();
            $table->string('finish')->nullable();
            $table->string('width')->nullable();
            $table->string('diameter')->nullable();
            $table->string('centerbore')->nullable();
            $table->string('wheelDiameter')->nullable();
            $table->string('tireSize')->nullable();
            $table->string('terrain')->nullable();
            $table->string('utqg')->nullable();
            $table->string('mileageWarranty')->nullable();
            $table->string('series')->nullable();
            $table->string('sectionWidth')->nullable();
            $table->string('weight')->nullable();
            $table->string('speedRating')->nullable();
            $table->string('rimDiameter')->nullable();
            $table->string('minWidthIn')->nullable();
            $table->string('maxWidthIn')->nullable();
            $table->string('loadIndex')->nullable();
            $table->string('treadDepth')->nullable();
            $table->string('load_pounds')->nullable();
            $table->string('overall_diameter')->nullable();
            $table->string('productDesc')->nullable();
            $table->string('imageCode')->nullable();
            $table->string('backspacing')->nullable();
            $table->string('wheelWeight')->nullable();
            $table->string('capPartNo')->nullable();
            $table->string('rivetPartNo')->nullable();
            $table->string('tpmsCompatible')->nullable();
            $table->string('lipDepth')->nullable();
            $table->string('certification')->nullable();
            $table->string('structuralWarranty')->nullable();
            $table->string('finishWarranty')->nullable();
            $table->string('openEndCap')->nullable();
            $table->string('capScrewNo')->nullable();
            $table->string('otherAccessories')->nullable();
            $table->string('additionalAccessories')->nullable();
            $table->string('catalogPage')->nullable();
            $table->string('loadRating')->nullable();
            $table->string('sizeDesc')->nullable();



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
