<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Commande;
use App\Models\Produit;
use App\Models\ProduitCommande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->is_blocked) {
            return view('blocked.index');
        } else {
            if ($user->is_admin) {
                return redirect()->route("admin.products.index");
            } else {
                // ----------------------------
                $dd = DB::table('products')
                    ->join('categories', 'products.category_id', '=', 'categories.id')
                    ->select('products.*', 'categories.name as category')
                    ->orderByDesc('id')
                    ->get();
                $cat = DB::table('categories as c')
                    ->leftJoin('products as p', 'c.id', '=', 'p.category_id')
                    ->select('c.id', 'c.name', DB::raw('COUNT(p.id) as count'))
                    ->groupBy('c.id', 'c.name')
                    ->orderByDesc('count')
                    ->get();
                return view('client.index', ["dd" => $dd, "cat" => $cat]);
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
        if ($user->is_blocked) {
            return view('blocked.index');
        } else {
            if ($user->is_admin) {
                return redirect()->route("admin.products.index");
            } else {
                // ----------------------------
                $data = Produit::select('*')->find($id);
                $cat = DB::table('categories as c')
                    ->leftJoin('products as p', 'c.id', '=', 'p.category_id')
                    ->select('c.id', 'c.name', DB::raw('COUNT(p.id) as count'))
                    ->groupBy('c.id', 'c.name')
                    ->orderByDesc('count')
                    ->get();
                return view('client.show', ['data' => $data, "cat" => $cat]);
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
    public function category(string $id)
    {
        $user = Auth::user();
        if ($user->is_blocked) {
            return view('blocked.index');
        } else {
            if ($user->is_admin) {
                return redirect()->route("admin.products.index");
            } else {
                // ----------------------------
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
                return view('client.category', ['dd' => $dd, 'cat' => $cat]);
            }
        }
    }
    public function search(Request $request)
    {
        $user = Auth::user();
        if ($user->is_blocked) {
            return view('blocked.index');
        } else {
            if ($user->is_admin) {
                return redirect()->route("admin.products.index");
            } else {
                // ----------------------------
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

                return view('client.search', ["dd" => $dd, "cat" => $cat, "search" => $request->search]);
            }
        }

    }
    public function filter(Request $request)
    {
        $user = Auth::user();
        if ($user->is_blocked) {
            return view('blocked.index');
        } else {
            if ($user->is_admin) {
                return redirect()->route("admin.products.index");
            } else {
                // ----------------------------
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
                return view('client.filter', ["dd" => $dd, "cat" => $cat, "min" => $request["min-price"], "max" => $request["max-price"]]);

            }
        }
    }
    public function cart(string $id)
    {
        $user = Auth::user();
        if ($user->is_blocked) {
            return view('blocked.index');
        } else {
            if ($user->is_admin) {
                return redirect()->route("admin.products.index");
            } else {
                // ----------------------------
                $userId = Auth::id();
                $productId = $id;


                $cart = Cart::where('user_id', $userId)->first();

                if (!$cart) {
                    $cart = new Cart();
                    $cart->user_id = $userId;
                    $cart->save();
                    $cart = Cart::where('user_id', $userId)->first();
                }

                $record = DB::table('produit_cart')
                    ->where('cart_id', $cart->id)
                    ->where('produit_id', $productId)
                    ->first();

                if (!$record) {
                    DB::table('produit_cart')->insert([
                        'cart_id' => $cart->id,
                        'produit_id' => $productId,
                        'qte' => 1,
                    ]);

                } else {
                    DB::table('produit_cart')
                        ->where('cart_id', $cart->id)
                        ->where('produit_id', $productId)
                        ->update(['qte' => $record->qte += 1]);
                }

                // return $userId = Auth::id();
                return redirect()->back();
            }
        }

    }
    public function shopping()
    {
        $user = Auth::user();
        if ($user->is_blocked) {
            return view('blocked.index');
        } else {
            if ($user->is_admin) {
                return redirect()->route("admin.products.index");
            } else {
                // ----------------------------
                // $products= [];
                $userId = Auth::id();

                $products = DB::table('products')
                    ->select('products.*', 'produit_cart.qte')
                    ->join('produit_cart', 'produit_cart.produit_id', '=', 'products.id')
                    ->join('carts', 'carts.id', '=', 'produit_cart.cart_id')
                    ->where('carts.user_id', '=', $userId)
                    ->get();

                $total = 0;
                foreach ($products as $p) {
                    $total += ($p->prix * $p->qte);
                }
                $cat = DB::table('categories as c')
                    ->leftJoin('products as p', 'c.id', '=', 'p.category_id')
                    ->select('c.id', 'c.name', DB::raw('COUNT(p.id) as count'))
                    ->groupBy('c.id', 'c.name')
                    ->orderByDesc('count')
                    ->get();
                // return 'shopping client';
                return view('client.shopping', ["cart" => $products, "total" => $total, "cat" => $cat]);
            }
        }
    }
    public function confirmer()
    {
        $user = Auth::user();
        if ($user->is_blocked) {
            return view('blocked.index');
        } else {
            if ($user->is_admin) {
                return redirect()->route("admin.products.index");
            } else {
                // ----------------------------
                $userId = Auth::id();

                $products = DB::table('produit_cart')
                    ->select('produit_id', 'qte')
                    ->join('carts', 'carts.id', '=', 'produit_cart.cart_id')
                    ->where('carts.user_id', '=', $userId)
                    ->get()
                    ->toArray();

                if ($products) {
                    $commande = new Commande();
                    $commande->user_id = $userId;
                    $commande->status_id = 1;
                    $commande->save();

                    foreach ($products as $product) {
                        $produitCommand = new ProduitCommande();
                        $produitCommand->commande_id = $commande->id;
                        $produitCommand->produit_id = $product->produit_id;
                        $produitCommand->qte = $product->qte;
                        $produitCommand->save();
                    }

                    DB::table('carts')->where('user_id', $userId)->delete();

                    return redirect()->route('client.produit.index')->with('success', 'commande has been ordered.');
                }
                return redirect()->route('client.produit.index')->with('error', 'no products in commande.');

            }
        }
    }
    public function historique()
    {
        $user = Auth::user();
        if ($user->is_blocked) {
            return view('blocked.index');
        } else {
            if ($user->is_admin) {
                return redirect()->route("admin.products.index");
            } else {
                // ----------------------------
                $user = Auth::user();
                $cart = DB::table('commandes')
                    ->join('status', 'commandes.status_id', '=', 'status.id')
                    ->where('commandes.user_id', $user->id)
                    ->select('commandes.*', 'status.name as status_name')
                    ->orderByDesc('created_at')
                    ->get();

                $cat = DB::table('categories as c')
                    ->leftJoin('products as p', 'c.id', '=', 'p.category_id')
                    ->select('c.id', 'c.name', DB::raw('COUNT(p.id) as count'))
                    ->groupBy('c.id', 'c.name')
                    ->orderByDesc('count')
                    ->get();
                return view('client.historique', ["cart" => $cart, "cat" => $cat]);
                // return dd($cart);
            }
        }
    }
    public function details(string $id)
    {
        $user = Auth::user();
        if ($user->is_blocked) {
            return view('blocked.index');
        } else {
            if ($user->is_admin) {
                return redirect()->route("admin.products.index");
            } else {
                // ----------------------------
                $userId = Auth::user()->id;

                $products = DB::table('products')
                    ->select('products.*', 'produit_commande.qte', 'status.name AS status_name', 'commandes.created_at AS cmddate')
                    ->join('produit_commande', 'produit_commande.produit_id', '=', 'products.id')
                    ->join('commandes', 'commandes.id', '=', 'produit_commande.commande_id')
                    ->join('status', 'status.id', '=', 'commandes.status_id')
                    ->where('commandes.user_id', '=', $userId)
                    ->where('commandes.id', '=', $id)
                    ->get();

                $cat = DB::table('categories as c')
                    ->leftJoin('products as p', 'c.id', '=', 'p.category_id')
                    ->select('c.id', 'c.name', DB::raw('COUNT(p.id) as count'))
                    ->groupBy('c.id', 'c.name')
                    ->orderByDesc('count')
                    ->get();

                $total = 0;
                foreach ($products as $p) {
                    $total += ($p->prix * $p->qte);
                }
                return view('client.details', ['cart' => $products, "cat" => $cat, "total" => $total]);
                // return $products;
                // return view('client.historique', ["cart" => $products, "cat" => $cat]);
            }
        }
    }
}