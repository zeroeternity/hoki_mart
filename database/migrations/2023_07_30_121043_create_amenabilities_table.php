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
        Schema::create('amenabilities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('limit');
            $table->enum('status', ['0', '1'])->default(1)->comment('0 = Not Active, 1 = Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('amenabilities');
    }
};
