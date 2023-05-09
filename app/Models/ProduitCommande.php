<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProduitCommande extends Model
{
    use HasFactory;
    protected $table="produit_commande";
    protected $fillable = [
        "produit_id",
        "commande_id"
    ];
    public function user()
    {
        return $this->belongsTo(Cart::class);
    }
}
