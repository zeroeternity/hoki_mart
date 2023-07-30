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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cashier_id')->references('id')->on('users');
            $table->foreignId('member_id')->nullable()->references('id')->on('users');
            $table->enum('payment_method', ['0', '1', '2'])->default(0)->comment('0 = Cash, 1 = Piutang, 2 = Voucher');
            $table->enum('status', ['0', '1', '2'])->default(0)->comment('0 = Pending, 1 = Confirm, 2 = Reject');
            $table->date('confirm_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
