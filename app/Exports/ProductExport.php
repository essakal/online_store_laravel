<?php

namespace App\Exports;

use App\Models\Produit;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // return Produit::select("id", "name", "email")->get();
        return DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.id','products.name', 'products.image', 'products.description', 'products.prix', 'categories.name as category')
            ->orderByDesc('id')
            ->get();
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {
        return ["ID", "Name", "image", "description", "prix"," categorie"];
    }
}