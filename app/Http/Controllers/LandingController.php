<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriModel;
use App\Models\ProdukModel;

class LandingController extends Controller
{
    public function index()
    {
        $kategori = KategoriModel::all(); // Ambil semua data kategori dari database
        $produk = ProdukModel::all(); // Ambil semua data produk dari database

        return view('landing.landing', [
            'title' => 'Landing',
            'kategori' => $kategori,
            'produk' => $produk, // Kirim data produk ke view
        ]);
    }
}

