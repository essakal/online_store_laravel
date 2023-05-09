<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commandes extends Model
{
    use HasFactory;
    protected $table="produit_cart";
    protected $fillable = [
        "user_id",
        "status_id"
    ];
    public function user()
    {
        return $this->belongsTo(Cart::class);
    }
    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
