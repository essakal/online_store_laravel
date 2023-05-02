<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $fillable = [
        "name",
        "image",
        "description",
        "prix",
        "quantité",
        "category_id"
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
