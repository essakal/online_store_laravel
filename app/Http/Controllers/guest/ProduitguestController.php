<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProduitguestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cat = DB::table('categories as c')
            ->leftJoin('products as p', 'c.id', '=', 'p.category_id')
            ->select('c.id', 'c.name', DB::raw('COUNT(p.id) as count'))
            ->groupBy('c.id', 'c.name')
            ->orderByDesc('count')
            ->get();

        $dd = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.name as category')
            ->orderByDesc('id')
            ->get();
        // $cat = Category::get();
        return view('guest.index', ["dd" => $dd, "cat" => $cat]);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Produit::select('*')->find($id);
        // $cat = Category::get();
        $cat = DB::table('categories as c')
            ->leftJoin('products as p', 'c.id', '=', 'p.category_id')
            ->select('c.id', 'c.name', DB::raw('COUNT(p.id) as count'))
            ->groupBy('c.id', 'c.name')
            ->orderByDesc('count')
            ->get();
        return view('guest.show', ['data' => $data, 'cat' => $cat]);
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
    public function cart(string $id)
    {
        $idproduit = $id;
        $cookieData = request()->cookie('cart');

        if ($cookieData) {
            $idsArray = json_decode($cookieData, true);
            $idsArray[] = $idproduit;
        } else {
            $idsArray = [$idproduit];
        }

        $cookieValue = json_encode($idsArray);
        $cookie = cookie('cart', $cookieValue, 60000);
        return redirect()->back()->withCookie($cookie);
    }
    public function category(string $id)
    {
        // $products = Produit::where('category_id', $id)->get();
        // ->join('categories', 'products.category_id', '=', 'categories.id')
        //     ->select('products.*', 'categories.name as category')
        //     ->orderByDesc('id')
        //     ->get();
        $dd = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.name as category')
            ->where('category_id', $id)
            ->orderByDesc('id')
            ->get();
        // $cat = Category::get();
        $cat = DB::table('categories as c')
            ->leftJoin('products as p', 'c.id', '=', 'p.category_id')
            ->select('c.id', 'c.name', DB::raw('COUNT(p.id) as count'))
            ->groupBy('c.id', 'c.name')
            ->orderByDesc('count')
            ->get();
        // return dd($dd);
        return view('guest.category', ['dd' => $dd, 'cat' => $cat]);
    }
    public function search(Request $request)
    {
        $dd = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.name as category')
            ->where('products.name', 'like', '%' . $request->search . '%')
            ->orderByDesc('id')
            ->get();

        $cat = DB::table('categories as c')
            ->leftJoin('products as p', 'c.id', '=', 'p.category_id')
            ->select('c.id', 'c.name', DB::raw('COUNT(p.id) as count'))
            ->groupBy('c.id', 'c.name')
            ->orderByDesc('count')
            ->get();

        return view('guest.search', ["dd" => $dd, "cat" => $cat, "search" => $request->search]);
    }
    public function filter(Request $request)
    {
        $dd = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.name as category')
            // ->where('products.name', 'like', '%' . $request->search . '%')
            ->whereBetween('products.prix', [$request["min-price"], $request["max-price"]])
            ->orderByDesc('id')
            ->get();

        $cat = DB::table('categories as c')
            ->leftJoin('products as p', 'c.id', '=', 'p.category_id')
            ->select('c.id', 'c.name', DB::raw('COUNT(p.id) as count'))
            ->groupBy('c.id', 'c.name')
            ->orderByDesc('count')
            ->get();
        // return $request;
        return view('guest.filter', ["dd" => $dd, "cat" => $cat, "min"=>$request["min-price"],"max"=> $request["max-price"] ]);
    }
    public function test()
    {
        $myArray = json_decode(request()->cookie('cart'), true);
        return dd($myArray);
    }

}