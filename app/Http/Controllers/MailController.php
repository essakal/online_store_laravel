<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\DemoMail;
use App\Models\Commande;

class MailController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $commande = session('commande');
        $data = Commande::join('status', 'commandes.status_id', '=', 'status.id')
            ->join('users', 'commandes.user_id', '=', 'users.id')
            ->select('commandes.*', 'status.name as status_name', 'users.name as user_name', 'users.email as user_email')
            ->where('commandes.id', $commande->id)
            ->first();

        $mailData = [
            'data' => $data
        ];

        Mail::to($data->user_email)->send(new DemoMail($data));
        // Mail::to('abdoessakal@gmail.com')->send(new DemoMail($mailData));
        // return $data;
        // dd("Email is sent successfully.");
        return redirect()->route('admin.commandes.details', $data->id)->with('success', 'Status updated successfully.');
    }
}
// $commande
// {
//     "id": 3,
//     "user_id": 1,
//     "status_id": "2",
//     "created_at": "2023-05-09T13:51:33.000000Z",
//     "updated_at": "2023-05-09T18:51:46.000000Z"
//     }

// $data
// {
//     "id": 3,
//     "user_id": 1,
//     "status_id": 3,
//     "created_at": "2023-05-09T13:51:33.000000Z",
//     "updated_at": "2023-05-09T18:55:30.000000Z",
//     "status_name": "valider",
//     "user_name": "client",
//     "user_email": "client@gmail.com"
//     }