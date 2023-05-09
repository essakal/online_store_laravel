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
            $table->unsignedBigInteger("produit_id");
            $table->unsignedBigInteger("commande_id");
            $table->timestamps();
            $table->foreign("produit_id")->references("id")->on("products")->onDelete("cascade");
            $table->foreign("commande_id")->references("id")->on("commandes")->onDelete("cascade");
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
