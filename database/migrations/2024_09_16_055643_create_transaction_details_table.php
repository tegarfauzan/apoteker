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
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("product_transaction_id");
            $table->unsignedBigInteger("product_id");
            $table->foreign("product_transaction_id")->references('id')->on('product_transactions')->onDelete('cascade');
            $table->foreign("product_id")->references('id')->on('products')->onDelete('cascade');
            $table->unsignedBigInteger("price");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_details');
    }
};
