<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksiModel;
use App\Models\SettingModel;
use Illuminate\Http\Request;

class DetailTransaksiController extends Controller
{
    public function index()
    {
        $settingItem = SettingModel::first();

        return view('pages.toko.index', [
            'title' => 'Transaksi Toko',
            'active' => 'TransaksiT',
            'settingItem' => $settingItem, // Menambahkan settingItem ke dalam array
        ]);
    }

}