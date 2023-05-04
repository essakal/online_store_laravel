<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Produit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = $check = Category::get();
        return view('admin.product.create', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'prix' => 'required|numeric|min:0.01',
            'quantite' => 'required|integer|min:0',
            'category' => 'required|integer|min:1'
        ]);

        $image = $request->file('image');
        $imageName = time() . '.' . $image->extension();
        $image->storeAs('public/images', $imageName);

        $data['name'] = $request->name;
        $data['description'] = $request->name;
        $data['image'] = $image->storeAs($imageName);
        $data['prix'] = $request->prix;
        $data['quantité'] = $request->quantite;
        $data['category_id'] = $request->category;

        $data['created_at'] = date('Y-m-d H:i:s');
        Produit::create($data);

        return dd($data);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}