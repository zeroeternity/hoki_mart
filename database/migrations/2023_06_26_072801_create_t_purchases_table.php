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
        Schema::create('t_purchases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('supllier_id')->references('id')->on('m_suppliers');
            $table->foreignId('stock_id')->references('id')->on('stocks');
            $table->foreignId('purchase_journal_id')->references('id')->on('purchase_journals');
            $table->foreignId('m_units_id')->references('id')->on('m_units');
            $table->string('no_faktur');
            $table->timestamp('tgl_faktur');
            $table->timestamp('tgl_jatuh_tempo')->nullable();
            $table->integer('grandtotal_pembelian');
            $table->integer('purchase_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_purchases');
    }
};
