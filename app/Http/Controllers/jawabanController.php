<?php

namespace App\Http\Controllers;

use App\Models\jawaban;
use Illuminate\Http\Request;

class jawabanController extends Controller
{
    public function index(){
        $data = jawaban::all();
        return view('jawaban.index',[
            'title' => 'data Jawaban',
            'data' => $data
        ]);
    }

    public function store(Request $request, $id){
        $data = jawaban::create([
            'id_pertanyaan' => $id,
            'jawaban' => $request->jawaban
        ]);

        if ($data) {
            return back()->with('success', 'Berhasil disimpan');
        }
        return back()->with('Danger', 'Gagal disimpan');
    }
}
