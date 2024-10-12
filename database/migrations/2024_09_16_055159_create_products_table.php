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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("slug");
            $table->string("photo");
            // ini supaya tidak berlaku jika terjadi negatif si price nya
            $table->unsignedBigInteger("price");
            $table->unsignedBigInteger("category_id");
            $table->text("about");
            // constrained() itu terjadi karena category_id itu namanya sama dengan si category, jika cate_id maka tidak bisa gini, maka harus reference
            // onDelete("cascade") ini biar jika si product ini di hapus maka yang bergantung ke ini dia akan ikut terhapus, tujuan : biar tidak bentrok
            $table->foreign("category_id")->references('id')->on('categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
