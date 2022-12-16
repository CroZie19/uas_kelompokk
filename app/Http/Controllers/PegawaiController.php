<?php

namespace App\Http\Controllers;

//Import Model
use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Http\Resources\PegawaiResource;
use Illuminate\Support\Facades\Validator;

class PegawaiController extends Controller
{
   /**
    * index
    *
    * @return void
    */
    public function index()
    {
        //get posts
        $pegawai = Pegawai::latest()->get();
        //render view with posts
        return new PegawaiResource(true, 'List Data Pegawai', $pegawai);
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
            'nama_pegawai' => 'required',
            'email' => 'required',
            'no_pegawai' => 'required',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        //Fungsi Post ke Database
        $pegawai = Pegawai::create([
            'nama_pegawai' => $request->nama_pegawai,
            'email' => $request->email,
            'no_pegawai' => $request->no_pegawai,
            'password' => $request->password
        ]);
        return new PegawaiResource(true, 'Data Pegawai
        Berhasil Ditambahkan!', $pegawai);

    }

    // public function create()
    // {
    //     return view('pegawai.create');
    // }

    // public function destroy($id)
    // {
    //     $pegawai = Pegawai::where('id',$id)->firstorfail()->delete();
    //     echo ("Pegawai Deleted Successfully [!]");
    //     return redirect()->route('pegawai.index');
    // }

}
