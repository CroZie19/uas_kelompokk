<?php

namespace App\Http\Controllers;

/* Import Model */
use App\Models\Pengguna;
use Illuminate\Http\Request;

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
        $pengguna = Pengguna::get();
        //render view with posts
        return view('pengguna.index', compact('pengguna'));
    }


}
