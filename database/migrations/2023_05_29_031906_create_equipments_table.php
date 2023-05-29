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
        Schema::create('equipments', function (Blueprint $table) {
            $table->id('equipments_id');
            $table->string('equipments_id_custom')->unique();
            $table->string('name');
            $table->unsignedBigInteger('equipments_categories_id');
            $table->foreign('equipments_categories_id')->references('equipments_categories_id')->on('equipment_categories')->onDelete('cascade');
            $table->string('ip_address')->nullable();
            $table->string('is_active')->nullable();
            $table->string('is_connect')->nullable();
            $table->string('username')->nullable();
            $table->string('password')->nullable();
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
        Schema::dropIfExists('equipments');
    }
};
