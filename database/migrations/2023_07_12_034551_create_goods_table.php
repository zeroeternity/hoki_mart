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
        Schema::create('goods', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->foreignId('group_id')->references('id')->on('groups');
            $table->foreignId('ppn_type_id')->references('id')->on('ppn_types');
            $table->foreignId('unit_id')->references('id')->on('units');
            $table->integer('purchase_price');
            $table->integer('selling_price');
            $table->integer('minimum_stock');
            $table->enum('margin_member', ['0', '1'])->default(0)->comment('0 = Not Active, 1 = Active');
            $table->decimal('percent_non_margin');
            $table->enum('status', ['0', '1'])->default(1)->comment('0 = Not Active, 1 = Active');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('goods');
    }
};
