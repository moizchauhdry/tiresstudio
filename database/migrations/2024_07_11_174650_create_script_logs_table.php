<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScriptLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('script_logs', function (Blueprint $table) {
            $table->id();

            $table->string('api_type', 100)->nullable();
            $table->integer('total_count')->nullable();
            $table->integer('current_page')->nullable();
            $table->integer('total_page')->nullable();

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
        Schema::dropIfExists('script_logs');
    }
}
