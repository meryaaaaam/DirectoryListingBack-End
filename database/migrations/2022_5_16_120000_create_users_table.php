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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('companyname')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone')->nullable();
            $table->string('adresse')->nullable();
            $table->string('website')->nullable();
            $table->text('bio')->nullable();
            $table->longtext('logo')->nullable();
            $table->longtext('CV')->nullable();
            $table->string('language')->nullable();
            $table->string('NEQ')->nullable();
            $table->string('role')->nullable();
            $table->boolean('isActive')->nullable();
            $table->enum('status', ['approuved','rejected' , 'preding'])->default('preding');
            $table->boolean('isEmailActive')->nullable()->default(0);
            $table->boolean('isAvailable')->nullable()->default(0);
            $table->boolean('IACNC')->nullable()->default(0);
            $table->string('LinkedIn')->nullable();
            $table->string('Line_type')->nullable();
            $table->string('note')->nullable();

            $table->foreignId('adress_id')->nullable();

            $table->foreign('adress_id')
            ->on('adresses')
            ->references('id')
            ->onDelete('cascade');




            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
