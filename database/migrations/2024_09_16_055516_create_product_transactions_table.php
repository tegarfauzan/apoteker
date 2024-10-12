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
        Schema::create('product_transactions', function (Blueprint $table) {
            $table->id();
            $table->string("address");
            $table->string("post_code");
            $table->string("phone_number");
            $table->string("proof");
            $table->string("city");
            $table->boolean("is_paid");
            // ini supaya tidak berlaku jika terjadi negatif si price nya
            $table->unsignedBigInteger("total_amount");
            $table->text("notes");
            $table->unsignedBigInteger("user_id");
            // constrained() itu terjadi karena category_id itu namanya sama dengan si category, jika cate_id maka tidak bisa gini, maka harus reference
            // onDelete("cascade") ini biar jika si product ini di hapus maka yang bergantung ke ini dia akan ikut terhapus, tujuan : biar tidak bentrok
            $table->foreign("user_id")->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_transactions');
    }
};
