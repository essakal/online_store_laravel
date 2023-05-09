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
        Schema::create('produit_cart', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("produit_id");
            $table->unsignedBigInteger("cart_id");
            $table->integer('qte');
            $table->timestamps();
            $table->foreign("produit_id")->references("id")->on("products")->onDelete("cascade");
            $table->foreign("cart_id")->references("id")->on("carts")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produit_cart');
    }
};
