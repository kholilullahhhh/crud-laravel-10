<?php

namespace App\Http\Controllers;
use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Buku::query();

        // Pencarian
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('judul', 'like', "%{$search}%")
                ->orWhere('pengarang', 'like', "%{$search}%");
        }

        // Paginasi
        $buku = $query->paginate(10);

        return view('index', compact('buku'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Buku::create($data);
        return redirect()->route('index');
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
        $edit = Buku::find($id);
        return view('edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $update = $request->all();
        $buku = Buku::find($id);
        $buku->update($update);
        return redirect()->route('index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $buku = Buku::findOrfail($id);
        $buku->delete();
        return redirect()->route('index');
    }
}
