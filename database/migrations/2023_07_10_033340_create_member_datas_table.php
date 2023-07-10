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
        Schema::create('member_datas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_type_id')->references('id')->on('member_types');
            $table->foreignId('estate_id')->references('id')->on('estates');
            $table->foreignId('position_id')->references('id')->on('positions');
            $table->string('name');
            $table->string('ktp');
            $table->string('gender');
            $table->date('birthdate');
            $table->date('entry_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_datas');
    }
};
