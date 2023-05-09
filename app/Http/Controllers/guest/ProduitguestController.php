<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProduitguestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if (!$user) {
            // return $user;
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
        } else {
            if ($user->is_blocked) {
                return view('blocked.index');
            } else {
                if ($user->is_admin) {
                    return redirect()->route('admin.products.index');
                } else {
                    return redirect()->route('client.produit.index');
                    // return "client";
                }
            }
        }

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
        $user = Auth::user();
        if (!$user) {
            // -------------------------------
            $data = Produit::select('*')->find($id);
            // $cat = Category::get();
            $cat = DB::table('categories as c')
                ->leftJoin('products as p', 'c.id', '=', 'p.category_id')
                ->select('c.id', 'c.name', DB::raw('COUNT(p.id) as count'))
                ->groupBy('c.id', 'c.name')
                ->orderByDesc('count')
                ->get();
            return view('guest.show', ['data' => $data, 'cat' => $cat]);
        } else {
            if ($user->is_blocked) {
                return view('blocked.index');
            } else {
                if ($user->is_admin) {
                    return redirect()->route('admin.products.index');
                } else {
                    return redirect()->route('client.produit.index');
                    // return "client";
                }
            }
        }
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
        $user = Auth::user();
        if (!$user) {
            // -------------------------------
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
        } else {
            if ($user->is_blocked) {
                return view('blocked.index');
            } else {
                if ($user->is_admin) {
                    return redirect()->route('admin.products.index');
                } else {
                    return redirect()->route('client.produit.index');
                    // return "client";
                }
            }
        }
    }
    public function category(string $id)
    {
        $user = Auth::user();
        if (!$user) {
            // -------------------------------
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
        } else {
            if ($user->is_blocked) {
                return view('blocked.index');
            } else {
                if ($user->is_admin) {
                    return redirect()->route('admin.products.index');
                } else {
                    return redirect()->route('client.produit.index');
                    // return "client";
                }
            }
        }
    }
    public function search(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            // -------------------------------
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
        } else {
            if ($user->is_blocked) {
                return view('blocked.index');
            } else {
                if ($user->is_admin) {
                    return redirect()->route('admin.products.index');
                } else {
                    return redirect()->route('client.produit.index');
                    // return "client";
                }
            }
        }
    }
    public function filter(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            // -------------------------------
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
            return view('guest.filter', ["dd" => $dd, "cat" => $cat, "min" => $request["min-price"], "max" => $request["max-price"]]);

        } else {
            if ($user->is_blocked) {
                return view('blocked.index');
            } else {
                if ($user->is_admin) {
                    return redirect()->route('admin.products.index');
                } else {
                    return redirect()->route('client.produit.index');
                    // return "client";
                }
            }
        }
    }
    public function shopping()
    {
        $user = Auth::user();
        if (!$user) {
            // -------------------------------
            $myArray = json_decode(request()->cookie('cart'), true);
            $products = Produit::whereIn('id', $myArray)->get();
            $counts = array_count_values($myArray);
            // for ($i = 0; $i < count($products); $i++) {
            //     foreach ($counts as $k => $v) {
            //         if ($products[$i]->id == $k) {
            //             $products->count = $v;
            //         }
            //     }
            // }
            for ($i = 0; $i < count($products); $i++) {
                foreach ($counts as $k => $v) {
                    if ($products[$i]->id == $k) {
                        $products[$i]->count = $v;
                    }
                }
            }
            // print_r($products);
            // print_r($counts);
            // return dd($products);
            return view('guest.shopping', ["cart" => $products]);
        } else {
            if ($user->is_blocked) {
                return view('blocked.index');
            } else {
                if ($user->is_admin) {
                    return redirect()->route('admin.products.index');
                } else {
                    return redirect()->route('client.produit.index');
                    // return "client";
                }
            }
        }
    }


}