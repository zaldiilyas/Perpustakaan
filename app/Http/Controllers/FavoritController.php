<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoritController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.buku.favorite', [
            'favorites' => Favorite::with('user', 'book', 'category')->get()
        ]);
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
    public function store(Request $request, Favorite $favorite)
    {
        $existingPeminjaman = Favorite::where('user_id', $request->user_id)
                            ->where('book_id', $request->book_id)
                            ->first();
    
        if ($existingPeminjaman) {
            return redirect()->back()->with('error', 'Buku sudah ada di halaman Favorit');
        } else {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'book_id' => 'required',
            'category_id' => 'required',
            'keterangan' => 'required'
        ]);

        Favorite::create($validatedData);

        return redirect()->back()->with('success', 'Buku sudah tersimpan di halaman Favorit');
        }
    }   

    /**
     * Display the specified resource.
     */
    public function show(Favorite $favorite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Favorite $favorite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Favorite $favorite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Favorite $favorite, $id)
    {
        $favorite = Favorite::findOrFail($id);
        $favorite->destroy($favorite->id);
        return redirect()->back()->with('success', 'Buku Favorit Dihapus');
    }
}
