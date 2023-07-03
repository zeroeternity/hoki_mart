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
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('supllier_id');
            $table->foreign('supllier_id')->references('id')->on('m_suplliers');
            $table->unsignedBigInteger('stock_id');
            $table->foreign('stock_id')->references('id')->on('stocks');
            $table->unsignedBigInteger('purchase_journal_id');
            $table->foreign('purchase_journal_id')->references('id')->on('purchase_journals');
            $table->unsignedBigInteger('m_units_id');
            $table->foreign('m_units_id')->references('id')->on('m_units');
            $table->string('no_faktur');
            $table->timestamp('tgl_faktur');
            $table->timestamp('tgl_jatuh_tempo')->nullable();
            $table->decimal('grandtotal_pembelian');
            $table->decimal('purchase_price');
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
