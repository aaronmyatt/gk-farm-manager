<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeasurementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('measurements', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('created_by')->constrained('users');
            $table->foreignId('updated_by')->constrained('users');
            $table->foreignId('tank_id')->constrained('tanks');
            $table->decimal('ph')->nullable();
            $table->decimal('alkalinity')->nullable();
            $table->decimal('nh3')->nullable();
            $table->decimal('no2')->nullable();
            $table->decimal('no3')->nullable();
            $table->decimal('fe')->nullable();
            $table->decimal('temperature')->nullable();
            $table->decimal('salinity')->nullable();
            $table->text('remark')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('measurements');
    }
}
