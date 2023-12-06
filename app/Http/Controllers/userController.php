<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    public function index()
    {
        $user = User::get();
        return view('users.index', [
            'title' => 'Data Users',
            'data' => $user
        ]);
    }

    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        if ($user) {
            return redirect()->back()->with('success', 'berhasil tambah user');
        }
        return redirect()->back()->with('danger', 'Gagal tambah user');
    }

    public function edit($id)
    {
        $user = User::find($id);

        if (!$user) {
            return back()->with('danger', 'User not found');
        }

        return view('users.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return back()->with('danger', 'User not found');
        }

        $user->name = $request->name;
        $user->email = $request->email;

        if ($user->save()) {
            return back()->with('success', 'Berhasil edit user');
        }

        return back()->with('danger', 'Gagal edit user');
    }

    public function hapus($id)
    {
        // Temukan data berdasarkan ID
        $data = User::find($id);

        // Hapus data jika ditemukan
        if ($data) {
            $data->delete();
            return redirect()->back()->with('success', 'Data berhasil dihapus.');
        }

        // Redirect dengan pesan jika data tidak ditemukan
        return redirect()->back()->with('danger', 'Data tidak ditemukan.');
    }
}
