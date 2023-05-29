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
        Schema::create('queuings', function (Blueprint $table) {
            $table->id('queuing_id');

            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('services_id');
            $table->foreign('services_id')->references('services_id')->on('services')->onDelete('cascade');

            $table->unsignedBigInteger('equipments_id');
            $table->foreign('equipments_id')->references('equipments_id')->on('equipments')->onDelete('cascade');

            $table->string('order')->nullable();
            // $table->timestamps('start_date');
            // $table->timestamps('end_date');
            $table->string('status')->nullable();
            $table->string('name_user')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('queuings');
    }
};
