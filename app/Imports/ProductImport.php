<?php

namespace App\Imports;

use App\Models\Produit;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Hash;
use Illuminate\Support\Facades\Hash as FacadesHash;

class ProductImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Produit([
            'name' => $row['name'],
            'description' => $row['description'],
            'prix' => $row['prix'],
            'quantité' => $row['quantite'],
            'category_id' => $row['category'],
            'image' => '123.png',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}