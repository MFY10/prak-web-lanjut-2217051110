<?php

namespace App\Http\Controllers;

use App\Models\Kelas; // Pastikan ini ada
use Illuminate\Http\Request;
use App\Models\UserModel;

class UserController extends Controller
{
    public function profile($nama = '', $kelas = '', $npm = ''){
    
        $data = [
        'nama' => $nama,
        'kelas' => $kelas,
        'npm' => $npm
    ];

    return view('profile', $data);
    }

    // Fungsi create untuk menampilkan form
    public function create()
    {
        return view('create_user', [
            'kelas' => Kelas::all(),
        ]);
    }

    // Fungsi store untuk menerima data dari form dan menampilkan view profile
    public function store(Request $request)
    {
        // Validasi data jika diperlukan
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:10',
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        $user = UserModel::create($validatedData);

        $user->load('kelas');

        // Mengirim data yang di-input ke view profile
        return view('profile', [
            'nama' => $user->nama,
            'npm' => $user->npm,
            'nama_kelas' => $user->kelas->nama_kelas ?? 'Kelas ditemukan',
        ]);
    }
}
