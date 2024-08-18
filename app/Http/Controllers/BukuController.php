<?php

namespace App\Http\Controllers;
use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        return view('buku.index', compact('buku'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('buku.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $data = $request->all();

    // Handle the image upload
    if ($request->hasFile('gambar')) {
        $image = $request->file('gambar');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
        $data['gambar'] = $imageName;
    }

    Buku::create($data);
    return redirect()->route('buku.index');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $buku = Buku::findOrFail($id);
        return view('buku.show', compact('buku'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $edit = Buku::find($id);
        return view('buku.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $buku = Buku::find($id);

    $request->validate([
        'judul' => 'required|string|max:255',
        'pengarang' => 'required|string|max:255',
        'konten' => 'required',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation for image
    ]);

    $data = $request->only(['judul', 'pengarang', 'konten']);

    if ($request->hasFile('gambar')) {
        // Delete old image if exists
        if ($buku->gambar && file_exists(public_path('images/' . $buku->gambar))) {
            unlink(public_path('images/' . $buku->gambar));
        }

        // Store new image
        $imageName = time() . '.' . $request->gambar->extension();
        $request->gambar->move(public_path('images'), $imageName);
        $data['gambar'] = $imageName;
    }

    $buku->update($data);

    return redirect()->route('buku.index')->with('success', 'Buku berhasil diperbarui');
}


    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $buku = Buku::findOrFail($id);

        if ($buku->gambar && Storage::disk('public')->exists($buku->gambar)) {
            Storage::disk('public')->delete($buku->gambar);
        }

        $buku->delete();
        return redirect()->route('buku.index');
    }
}