<?php

namespace App\Http\Controllers;

use App\Models\Kelas; // Pastikan ini ada
use Illuminate\Http\Request;
use App\Models\UserModel;

class UserController extends Controller
{
    public $userModel;
    public $kelasModel;

    public function __construct(){
 
        $this->userModel = new UserModel();
 
        $this->kelasModel = new Kelas();
    }

    public function index(){
    $data = [
        'title' => 'Create User',
        'kelas' => $this->userModel->getUser(),
    ];
 return view('list_user', $data);
}


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
        $kelasModel = new Kelas();
        
        $kelas = $kelasModel->getKelas();
        
        $data = [
            'tittle' => 'Create User',
            'kelas' => $kelas,
        ];
 
        return view('create_user', $data);
    }

    // Fungsi store untuk menerima data dari form dan menampilkan view profile
    public function store(Request $request)
    {
        // Validasi data jika diperlukan
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:10',
            'kelas_id' => 'required|exists:kelas,id',
            'ipk' => 'nullable|numeric|min:0|max:4.00', // Validasi IPK
        ]);

        $user = UserModel::create($validatedData);

        $user->load('kelas');

        // Mengirim data yang di-input ke view profile
        return view('profile', [
            'nama' => $user->nama,
            'npm' => $user->npm,
            'nama_kelas' => $user->kelas->nama_kelas ?? 'Kelas ditemukan',
        ]);

        return redirect()->to('/user');
    }

    public function show($id){
    $LayananRekomenUmum = ModelLayananRekomendasiUmum::where('encrypted_id', $id)->first();

    $data = [
        'nama_mhs' => auth()->user()->mahasiswa->nama_mahasiswa,
        'npm' => auth()->user()->mahasiswa->npm,
        'jurusan' => auth()->user()->prodi->jurusan->nama,
        'prodi' => auth()->user()->prodi->nama,
        'encrypted_id' => $LayananRekomenUmum->encrypted_id,
        'ipk' => $LayananRekomenUmum->ipk,
        'kebutuhan_rekomen' => $LayananRekomenUmum->kebutuhan_rekomen,
        'tanggal' => Carbon::parse($LayananRekomenUmum->created_at)
            ->locale('id_ID')
            ->isoFormat('D MMMM YYYY, HH:mm'),
        ];

    return view('layanan_fakultas.akademik.permohonan.rekomendasi_umum.show', $data);
    }

}
