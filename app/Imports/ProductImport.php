<?php

namespace App\Imports;

use App\Models\Category;
use App\Models\Produit;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $category = Category::where('name', $row['category'])->first();

        if ($category) {
            $category_id = $category->id;
        } else {
            $category = new Category([
                'name' => $row['category']
            ]);
            $category->save();
            $cat = Category::where('name', $row['category'])->first();
            $category_id = $cat->id;
        }
        return new Produit([
            'name' => $row['name'],
            'description' => $row['description'],
            'prix' => $row['prix'],
            'quantité' => $row['quantite'],
            // 'category_id' => $row['category'],
            'category_id' => $category_id,
            'image' => '123.png',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}