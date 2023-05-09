<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
    protected $table="commandes";
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
