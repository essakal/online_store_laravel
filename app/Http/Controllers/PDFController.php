<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF(string $id)
    {
        $products = DB::table('products')
            ->select('products.*', 'produit_commande.qte', 'status.name AS status_name', 'commandes.created_at AS cmddate', 'users.name AS user_name', 'users.email AS user_email', 'commandes.id AS commande_id')
            ->join('produit_commande', 'produit_commande.produit_id', '=', 'products.id')
            ->join('commandes', 'commandes.id', '=', 'produit_commande.commande_id')
            ->join('status', 'status.id', '=', 'commandes.status_id')
            ->join('users', 'users.id', '=', 'commandes.user_id')
            ->where('commandes.user_id', '=', 1)
            ->where('commandes.id', '=', $id)
            ->get();

        $total = 0;
        foreach ($products as $p) {
            $total += ($p->prix * $p->qte);
        }
        $data = [
            'total' => $total,
            'products' => $products
        ];

        $pdf = PDF::loadView('myPDF', $data);

        return $pdf->download('commande_N' . $products[0]->commande_id . '.pdf');
        // return $data;
    }
}
// {
//     "id": 4,
//     "name": "produit4",
//     "image": "123.png",
//     "description": "desc4",
//     "prix": 13.12,
//     "quantité": 500,
//     "category_id": 1,
//     "created_at": "2023-05-09 02:16:45",
//     "updated_at": "2023-05-09 02:16:45",
//     "qte": 2,
//     "status_name": "in stock",
//     "cmddate": "2023-05-09 13:51:33",
//     "user_name": "client",
//     "user_email": "client@gmail.com",
//     "commande_id": 3
//     },
