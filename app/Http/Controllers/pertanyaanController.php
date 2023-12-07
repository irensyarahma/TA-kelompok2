<?php

namespace App\Http\Controllers;

use App\Models\pertanyaan;
use Illuminate\Http\Request;

class pertanyaanController extends Controller
{
    public function store(Request $request)
    {
        $data = pertanyaan::create([
            'id_kategori' => $request->id_kategori,
            'pertanyaan' => $request->pertanyaan
        ]);

        if ($data) {
            return back()->with('success', 'Berhasil mengajukan');
        }
        return back()->with('Danger', 'Gagal mengajukani');
    }

    public function index()
    {
        $data = pertanyaan::with('kategori')->get();
        if ($data) {
            return view('pertanyaan.index', [
                'title' => 'pertanyaan',
                'data' => $data
            ]);
        }
        return view('pertanyaan.index', [
            'title' => 'pertanyaan',
            'message' => 'data tidak ada'
        ])->with('info', 'tidak ada data');
    }

    public function hapus($id)
    {
        // Temukan data berdasarkan ID
        $data = pertanyaan::find($id);

        // Hapus data jika ditemukan
        if ($data) {
            $data->delete();
            return redirect()->back()->with('success', 'Data berhasil dihapus.');
        }

        // Redirect dengan pesan jika data tidak ditemukan
        return redirect()->back()->with('danger', 'Data tidak ditemukan.');
    }
}
