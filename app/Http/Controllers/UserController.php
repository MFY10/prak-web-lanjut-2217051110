<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('create_user');
    }

    // Fungsi store untuk menerima data dari form dan menampilkan view profile
    public function store(Request $request)
    {
        // Validasi data jika diperlukan
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:10',
            'kelas' => 'required|string|max:10',
        ]);

        // Mengirim data yang di-input ke view profile
        return view('profile', [
            'nama' => $validatedData['nama'],
            'npm' => $validatedData['npm'],
            'kelas' => $validatedData['kelas']
        ]);
    }
}
