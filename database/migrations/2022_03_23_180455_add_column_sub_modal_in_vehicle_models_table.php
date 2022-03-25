<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnSubModalInVehicleModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vehicle_models', function (Blueprint $table) {
            $table->string('subModel')->nullable()->after('model');
        });
    }

    /**
      *
     * @return void
     */
    public function down()
    {
        Schema::table('vehicle_models', function (Blueprint $table) {
            $table->dropColumn('subModel');
        });
    }
}
