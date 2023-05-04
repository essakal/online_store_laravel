<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data = Category::select('id', 'name')->orderBy('id', 'desc')->get();
        // $data = Category::select('id', 'name')
        //         ->withCount('produits')
        //         ->orderBy('id', 'desc')
        //         ->get();
        // $data = DB::table('categories')
        //     ->join('products', 'products.category_id', '=', 'categories.id')
        //     ->select('products.*', 'categories.name as category')
        //     ->orderByDesc('id')
        //     ->get();
        $data = DB::table('categories as c')
        ->leftJoin('products as p', 'c.id', '=', 'p.category_id')
        ->select('c.id', 'c.name', DB::raw('COUNT(p.id) as count'))
        ->groupBy('c.id', 'c.name')
        ->orderByDesc('id')
        ->get();
        return view('admin.category.categories', ['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data['name'] = $request->name;

        $check = Category::where('name', $request->name)->first();
        if($check) {
            return redirect()->route("admin.categories.index")->with('danger','"'.$check->name.'" already exist.');
        }

        $data['created_at'] = date('Y-m-d H:i:s');
        Category::create($data);
        return redirect()->route("admin.categories.index")->with('success','category has been created successfully.');
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
        $data = Category::select('*')->find($id);
        return view("admin.category.editcategories", ['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data['name'] = $request->name;

        $check = Category::where('name', $request->name)->whereNotIn('id', [$id])->first();
        if($check) {
            return redirect()->route("admin.categories.edit", $id)->with('danger','"'.$check->name.'" already exist.');
        }

        $data['name'] = $request->name;
        $data['updated_at'] = date('Y-m-d H:i:s');
        Category::where('id', $id)->update($data);
        return redirect()->route("admin.categories.index")->with('success','category has been edited successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::where('id', $id)->delete();
        return redirect()->route('admin.categories.index')->with('success','category has been deleted successfully.');
    }
}