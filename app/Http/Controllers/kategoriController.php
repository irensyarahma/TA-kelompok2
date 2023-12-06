<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use Illuminate\Http\Request;

class kategoriController extends Controller
{
    public function index()
    {
        $data = kategori::get();
        if ($data) {
            return view('kategori.index', [
                'title' => 'Data Kategori',
                'data' => $data
            ]);
        }
        return view('kategori.index', [
            'title' => 'Data Kategori',
            'data' => $data
        ]);
    }

    public function store(Request $request)
    {
        $data = kategori::create([
            'nama_kategori' => $request->nama_kategori
        ]);

        if ($data) {
            return back()->with('success', 'Berhasil tambah kategori');
        }
        return back()->with('Danger', 'Gagal tambah kategori');
    }

    public function update(Request $request, $id)
    {
        $data = kategori::find($id);

        if (!$data) {
            return back()->with('danger', 'kategori not found');
        }

        $data->nama_kategori = $request->nama_kategori;

        if ($data->save()) {
            return back()->with('success', 'Berhasil edit kategori');
        }

        return back()->with('danger', 'Gagal edit kategori');
    }

    public function hapus($id)
    {
        // Temukan data berdasarkan ID
        $data = kategori::find($id);

        // Hapus data jika ditemukan
        if ($data) {
            $data->delete();
            return redirect()->back()->with('success', 'Data berhasil dihapus.');
        }

        // Redirect dengan pesan jika data tidak ditemukan
        return redirect()->back()->with('danger', 'Data tidak ditemukan.');
    }
}
