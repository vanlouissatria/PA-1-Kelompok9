<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Warisan;
use Illuminate\Http\Request;

class WarisanController extends Controller
{
    public function index()
    {
        $data = Warisan::orderBy('jenis')->orderBy('urutan')->paginate(15);
        return view('admin.warisan.index', compact('data'));
    }

    public function create()
    {
        return view('admin.warisan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'     => 'required|string|max:255',
            'jenis'     => 'required|in:geodiversity,biodiversity,cultural_diversity',
            'deskripsi' => 'required|string',
            'gambar'    => 'nullable|image|mimes:jpeg,png,jpg|max:4096',
            'urutan'    => 'nullable|integer',
        ]);

        $data = [
            'judul'     => $request->judul,
            'jenis'     => $request->jenis,
            'deskripsi' => $request->deskripsi,
            'urutan'    => $request->urutan ?? 1,
            'status' => 1,
        ];

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('warisan', 'public');
            $data['gambar'] = $path;
        }

        Warisan::create($data);

        return redirect()->route('admin.warisan.index')
            ->with('success', 'Item berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $warisan = Warisan::findOrFail($id);
        return view('admin.warisan.edit', compact('warisan'));
    }

    public function update(Request $request, $id)
    {
        $warisan = Warisan::findOrFail($id);

        $request->validate([
            'judul'     => 'required|string|max:255',
            'jenis'     => 'required|in:geodiversity,biodiversity,cultural_diversity',
            'deskripsi' => 'required|string',
            'gambar'    => 'nullable|image|mimes:jpeg,png,jpg|max:4096',
            'urutan'    => 'nullable|integer',
        ]);

        $data = [
            'judul'     => $request->judul,
            'jenis'     => $request->jenis,
            'deskripsi' => $request->deskripsi,
            'urutan'    => $request->urutan ?? 1,
            'status' => 1,
        ];

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('warisan', 'public');
            $data['gambar'] = $path;
        }

        $warisan->update($data);

        return redirect()->route('admin.warisan.index')
            ->with('success', 'Item berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Warisan::findOrFail($id)->delete();
        return redirect()->route('admin.warisan.index')
            ->with('success', 'Item berhasil dihapus!');
    }
}