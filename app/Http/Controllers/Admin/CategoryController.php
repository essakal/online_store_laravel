<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Category::select('id', 'name')->orderBy('id', 'desc')->get();
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