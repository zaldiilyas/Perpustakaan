<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Ulasan;
use App\Models\User;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        
        if ($keyword) {
            $books = Books::where('judul', 'like', "%$keyword%")->get();
        } elseif ($request->has('categories')) {
            $categoryName = $request->categories;
            $books = Books::whereHas('category', function ($query) use ($categoryName) {
                $query->where('name', $categoryName);
            })->get();
        } else {
            $books = Books::all();
        }
        
        return view('book', compact('books', 'keyword'));
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
        $validatedData = $request->validate([
            'user_id' => 'required',
            'book_id' => 'required',
            'ulasan' => 'required',
            'rating' => 'required'
        ]);

        Ulasan::create($validatedData);

        return redirect()->back()->with('success', 'Anda berhasil menambahkan komentar');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
