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
        Schema::create('user_services', function (Blueprint $table) {
            $table->id();

            $table->foreignId('service_id')->nullable();

            $table->foreign('service_id')
            ->on('services')
            ->references('id')
            ->onDelete('cascade');


            $table->foreignId('user_id')->nullable();

            $table->foreign('user_id')
            ->on('users')
            ->references('id')
            ->onDelete('cascade');


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
        Schema::dropIfExists('user_services');
    }
};
