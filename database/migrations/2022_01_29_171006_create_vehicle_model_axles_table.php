<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleModelAxlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_model_axles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vehicle_model_id');
            $table->string('placement')->nullable();
            $table->string('code')->nullable();
            $table->string('vehiclePressureSensor')->nullable();
            $table->string('boltPatternMm')->nullable();
            $table->string('oeWidthIn')->nullable();
            $table->string('maxWidthIn')->nullable();
            $table->string('oeTireTx')->nullable();
            $table->string('oeHexTx')->nullable();
            $table->string('nutBolt')->nullable();
            $table->string('centerBoreMm')->nullable();
            $table->string('minWheelLoad')->nullable();
            $table->string('sensorPartNumberOe')->nullable();
            $table->string('hubCode')->nullable();
            $table->string('maxBs')->nullable();
            $table->string('maxFs')->nullable();
            $table->string('hubClearanceMm')->nullable();
            $table->string('yFactor')->nullable();
            $table->string('yFactor25')->nullable();
            $table->string('yFactor50')->nullable();
            $table->string('oeDiameterIn')->nullable();
            $table->string('minDiameterIn')->nullable();
            $table->string('maxDiameterIn')->nullable();
            $table->string('peakDepth')->nullable();
            $table->string('depth100mm')->nullable();
            $table->string('depth106mm')->nullable();
            $table->string('depth119mm')->nullable();
            $table->string('depth134mm')->nullable();
            $table->string('depth160mm')->nullable();
            $table->string('depth90mm')->nullable();
            $table->string('oeOffset')->nullable();
            $table->string('offsetMaxMm')->nullable();
            $table->string('offsetMinMm')->nullable();
            $table->string('liftOffsetMaxMm')->nullable();
            $table->string('liftOffsetMinMm')->nullable();
            $table->string('amLugStyle')->nullable();
            $table->string('lugNutSizeTx')->nullable();
            $table->string('lugCnt')->nullable();
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
        Schema::dropIfExists('vehicle_model_axles');
    }
}
