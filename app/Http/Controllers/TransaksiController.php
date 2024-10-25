<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksiModel;
use App\Models\TransaksiModel;
use App\Models\SettingModel;
use Illuminate\Http\Request;
use App\Models\ProdukModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = TransaksiModel::all(); // Mengambil semua data transaksi dari database
        $settingItem = SettingModel::first();
        
        return view('pages.toko.index', [
            'title' => 'Transaksi Toko',
            'active' => 'TransaksiT',
            'transaksi' => $transaksi, // Meneruskan data transaksi ke view
            'settingItem' => $settingItem, // Menambahkan settingItem ke dalam array
        ]);
    }
    
    public function create()
    {
        $settingItem = SettingModel::first();
        $produkList = ProdukModel::all();

        return view('pages.toko.create', [
            'title' => 'Transaksi',
            'active' => 'TransaksiT',
            'produk' => $produkList,
            'settingItem' => $settingItem, // Menambahkan settingItem ke dalam array
        ]);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'total_harga' => 'required',
            'diskon' => 'required',
            'bayar' => 'required',
            'diterima' => 'required',
            'kembali' => 'required',
            'details' => 'required|array'
        ], [
            'required' => 'Kolom :attribute harus diisi.',
            'array' => 'Kolom :attribute harus berupa array.',
            'integer' => 'Kolom :attribute harus berupa angka.',
            'numeric' => 'Kolom :attribute harus berupa angka.',
            'unique' => 'Nama budaya sudah ada. Harap pilih nama budaya yang lain.',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Validasi gagal', 'errors' => $validator->errors()], 422);
        }

        DB::beginTransaction();

        try {
            // Simpan data transaksi
            $transaksi = TransaksiModel::create([
                'total_harga' => $request->input('total_harga'),
                'diskon' => $request->input('diskon'),
                'bayar' => $request->input('bayar'),
                'diterima' => $request->input('diterima'),
                'kembali' => $request->input('kembali'),
                'jumlah_item' => count($request->input('details')),
                'details' => json_encode($request->input('details')), // Ubah details menjadi JSON
            ]);

            // dd($transaksi);
            // Simpan data detail transaksi
            foreach ($request->input('details') as $detail) {
                // Pastikan id_produk sesuai dengan data yang ada di database
                $id_produk = ProdukModel::getIdFromName($detail['id_produk']);

                DetailTransaksiModel::create([
                    'id_transaksi' => $transaksi->id_transaksi,
                    'id_produk' => $id_produk,
                    'qty' => $detail['qty'],
                    'harga' => $detail['harga'],
                ]);

                // Perbaiki penggunaan nilai kuantitas di sini
                ProdukModel::updateStok($id_produk, $detail['qty']);
            }


            DB::commit();

            return response()->json(['message' => 'Transaksi berhasil disimpan'], 200);
        } catch (\Exception $e) {
            DB::rollback();

            return response()->json(['message' => 'Transaksi gagal disimpan', 'error' => $e->getMessage()], 500);
        }
    }

}