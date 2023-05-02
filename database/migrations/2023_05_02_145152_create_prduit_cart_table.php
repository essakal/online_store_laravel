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
        Schema::create('prduit_cart', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_produit");
            $table->unsignedBigInteger("id_cart");
            $table->timestamps();
            $table->foreign("id_produit")->references("id")->on("products")->onDelete("cascade");
            $table->foreign("id_cart")->references("id")->on("carts")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prduit_cart');
    }
};
