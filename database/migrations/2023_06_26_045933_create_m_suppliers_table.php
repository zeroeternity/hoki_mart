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
        Schema::create('m_suppliers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bank_account_id')->references('id')->on('m_bank_accounts');
            $table->string('name');
            $table->string('address');
            $table->string('No_rekening');
            $table->string('name_bank');
            $table->string('NPWP');
            $table->string('no_telepon');
            $table->string('no_fax');
            $table->string('email');
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_suppliers');
    }
};
