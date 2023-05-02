<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Reference\Reference;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produit_commande', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_product");
            $table->unsignedBigInteger("id_commande");
            $table->timestamps();
            $table->foreign("id_product")->references("id")->on("products")->onDelete("cascade");
            $table->foreign("id_commande")->references("id")->on("commandes")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produit_commande');
    }
};
