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
        Schema::create('purchase_journals', function (Blueprint $table) {
            $table->id();
            $table->date('purchasing_date');
            $table->string('time_hours');
            $table->string('payment_method');
            $table->string('type');
            $table->string('description');
            $table->string('account_name');
            $table->string('account_description');
            $table->string('variation');
            $table->integer('total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_journals');
    }
};
