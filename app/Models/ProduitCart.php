<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProduitCart extends Model
{
    use HasFactory;
    protected $table="produit_cart";
    protected $fillable = [
        "produit_id",
        "cart_id",
        "qte"
    ];
    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }
    public function user()
    {
        return $this->belongsTo(Cart::class);
    }
}
