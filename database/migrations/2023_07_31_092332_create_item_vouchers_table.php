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
        Schema::create('item_vouchers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_id')->references('id')->on('users');
            $table->foreignId('member_voucher_id')->references('id')->on('member_vouchers');
            $table->foreignId('item_id')->references('id')->on('items');
            $table->foreignId('outlet_id')->references('id')->on('outlets');
            $table->integer('margin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_vouchers');
    }
};
