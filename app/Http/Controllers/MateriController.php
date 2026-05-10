<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MateriController extends Controller
{
    public function index()
    {
        $materis = Materi::latest()->get();
        return view('admin.materi', compact('materis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required',
            'kategori' => 'required',
            'target_audience' => 'required',
            'file_pdf' => 'required|mimes:pdf|max:50000', // Max 10MB
        ]);

        $file = $request->file('file_pdf');
        $path = $file->store('materi', 'public');

        Materi::create([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'deskripsi' => $request->deskripsi,
            'kategori' => $request->kategori,
            'target_audience' => $request->target_audience,
            'video_url' => $request->video_url,
            'file_pdf' => $path,
        ]);

        return back()->with('success', 'Materi berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        Materi::findOrFail($id)->delete();
        return back()->with('success', 'Materi berhasil dihapus.');
    }
}