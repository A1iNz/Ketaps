<?php

namespace App\Http\Controllers;

use App\Models\Sector;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SectorController extends Controller
{
    // Menampilkan halaman Kelola Sektor
    public function index()
    {
        $sectors = Sector::orderBy('nama_sektor', 'asc')->get();
        return view('admin.sectors', compact('sectors'));
    }

    // Menyimpan sektor baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_sektor' => 'required|string|max:255|unique:sectors,nama_sektor'
        ], [
            'nama_sektor.unique' => 'Nama sektor ini sudah ada di database.'
        ]);

        Sector::create([
            'nama_sektor' => $request->nama_sektor,
            'slug' => Str::slug($request->nama_sektor)
        ]);

        return back()->with('success', 'Sektor industri baru berhasil ditambahkan!');
    }

    // Menghapus sektor
    public function destroy($id)
    {
        $sector = Sector::findOrFail($id);
        $sector->delete();

        return back()->with('success', 'Sektor berhasil dihapus.');
    }
}