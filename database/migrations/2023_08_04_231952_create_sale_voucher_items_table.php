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
        Schema::create('sale_voucher_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sale_id')->references('id')->on('sales');
            $table->foreignId('item_voucher_id')->references('id')->on('item_vouchers');
            $table->integer('qty');
            $table->integer('sale_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sale_voucher_items');
    }
};
