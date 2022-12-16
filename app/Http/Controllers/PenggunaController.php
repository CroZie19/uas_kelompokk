<?php

namespace App\Http\Controllers;

/* Import Model */
use App\Models\Pengguna;
use Illuminate\Http\Request;
use App\Http\Resources\PenggunaResource;
use Illuminate\Support\Facades\Validator;

class PenggunaController extends Controller
{
    /**
    * index
    *
    * @return void
    */
    public function index()
    {
        //get posts
        $pengguna = Pengguna::latest()->get();

        //render view with posts
        return new PenggunaResource(true, 'List Data Pengguna', $pengguna);
    }
    /**
    * store
    *
    * @param Request $request
    * @return void
    */
    public function store(Request $request)
    {
        //Validasi Formulir
        $validator = Validator::make($request->all(), [
            'nama_pengguna' => 'required',
            'email' => 'required',
            'password' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        //Fungsi Post ke Database
        $pengguna = Pengguna::create([
            'nama_pengguna' => $request->nama_pengguna,
            'email' => $request->email,
            'password' => $request->password,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp
        ]);
        return new PenggunaResource(true, 'Data Pengguna
        Berhasil Ditambahkan!', $pengguna);

    }
}
