<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data = DB::table('users')
        // ->get();
        $data = DB::table('users')->where('id', '!=', auth()->user()->id)->get();
        return view('admin.user.index', ['data' => $data]);
        // ->orderByDesc('id')
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = User::select('*')->find($id);
        // $cat = Category::get();
        return view("admin.user.edit", ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'is_admin' => 'required',
            'is_blocked' => 'required'
        ]);
        
        User::where('id', $id)->update([
            'is_admin' => ($request->is_admin == "true" ? 1 : 0),
            'is_blocked' => ($request->is_blocked == "true" ? 1 : 0),
        ]);
        return redirect()->route("admin.users.index")->with('success', 'user has been edited successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}