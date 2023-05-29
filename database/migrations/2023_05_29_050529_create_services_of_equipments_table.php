<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services_of_equipments', function (Blueprint $table) {
            $table->id('services_of_equipments_id');
            $table->unsignedBigInteger('equipments_id');
            $table->unsignedBigInteger('services_id');
            $table->foreign('equipments_id')->references('equipments_id')->on('equipments')->onDelete('cascade');
            $table->foreign('services_id')->references('services_id')->on('services')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services_of_equipments');
    }
};
