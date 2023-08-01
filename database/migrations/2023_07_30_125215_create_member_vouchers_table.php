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
        Schema::create('member_vouchers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_id')->references('id')->on('users');
            $table->decimal('employee');
            $table->decimal('wife');
            $table->decimal('child');
            $table->decimal('total');
            $table->enum('status', ['0', '1'])->default(1)->comment('0 = Not Active, 1 = Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_vouchers');
    }
};
