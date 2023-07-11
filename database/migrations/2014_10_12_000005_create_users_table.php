<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id')->references('id')->on('roles');
            $table->foreignId('outlet_id')->references('id')->on('outlets');
            $table->foreignId('member_type_id')->nullable()->references('id')->on('member_types');
            $table->foreignId('estate_id')->nullable()->references('id')->on('estates');
            $table->foreignId('position_id')->nullable()->references('id')->on('positions') ;
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('phone')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('ktp')->nullable();
            $table->string('gender')->nullable();
            $table->date('birthdate')->nullable();
            $table->date('entry_date')->nullable();
            $table->enum('state', ['0', '1'])->default(1)->comment('1 = Active, 0 = NonActive');
            $table->rememberToken()->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
