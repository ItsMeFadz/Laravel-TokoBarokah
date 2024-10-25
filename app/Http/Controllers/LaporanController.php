<?php

namespace App\Http\Controllers;

use App\Models\TransaksiModel;
use App\Models\DetailTransaksiModel;
use App\Models\GudangModel;
use App\Models\SettingModel;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $tanggalAwal = date('Y-m-d', mktime(0, 0, 0, date('m'), 1, date('Y')));
        $tanggalAkhir = date('Y-m-d');
        $gudang = GudangModel::whereDate('created_at', '2024-02-20')->get();
        $settingItem = SettingModel::first();

        $transaksi = TransaksiModel::all();
        $transaksiDetail = DetailTransaksiModel::all();
        $gudang2 = GudangModel::all();

        if ($request->has('tanggal_awal') && $request->tanggal_awal != "" && $request->has('tanggal_akhir') && $request->tanggal_akhir) {
            $tanggalAwal = $request->tanggal_awal;
            $tanggalAkhir = $request->tanggal_akhir;
        }

        // Ambil data menggunakan metode getData
        $data = $this->getData($tanggalAwal, $tanggalAkhir);

        return view('pages.laporan.index', compact('tanggalAwal', 'tanggalAkhir', 'data', 'gudang', 'settingItem', 'transaksi', 'transaksiDetail', 'gudang2'));
    }

    public function getData($awal, $akhir)
    {
        $no = 1;
        $data = array();
        $total_pendapatan = 0;

        while (strtotime($awal) <= strtotime($akhir)) {
            $tanggal = $awal;
            $awal = date('Y-m-d', strtotime("+1 day", strtotime($awal)));

            $transaksis = TransaksiModel::whereDate('created_at', $tanggal)->get();
            $gudangs = GudangModel::whereDate('created_at', $tanggal)->get();

            $detail_penjualan = '';
            $total_penjualan = 0;
            foreach ($transaksis as $item) {
                $details = json_decode($item->details, true); // Decode kolom 'details'
                foreach ($details as $detail) {
                    $detail_penjualan .= $detail['id_produk'] . ' (' . $detail['kategori'] . ')  ' . ', qty: ' . $detail['qty'] . ', Harga: ' . format_uang($detail['harga']) . " \n"; // Menambahkan id_produk, qty, kategori, dan harga dengan baris baru
                    $total_penjualan += $detail['harga']; // Mengambil 
                }
            }

            $detail_pengeluaran = '';
            $total_pengeluaran = 0;
            foreach ($gudangs as $item) {
                $detail_pengeluaran .= $item->deskripsi . ' ' . '(' . format_uang($item->nominal) . ')' . " \n";
                $total_pengeluaran += $item->nominal;
            }

            $pendapatan = $total_penjualan - $total_pengeluaran;
            $total_pendapatan += $pendapatan;

            $row = array();
            $row['DT_RowIndex'] = $no++;
            $row['tanggal'] = tanggal_indonesia($tanggal, false);
            $row['detail_penjualan'] = $detail_penjualan;
            $row['transaksi'] = format_uang($total_penjualan);
            $row['details'] = ''; // Tidak perlu menyimpan detail JSON di sini
            $row['detail_pengeluaran'] = $detail_pengeluaran;
            $row['gudang'] = format_uang($total_pengeluaran);
            $row['pendapatan'] = format_uang($pendapatan);

            $data[] = $row;
        }

        $data[] = [
            'DT_RowIndex' => '',
            'tanggal' => '',
            'detail_penjualan' => '',
            'details' => '',
            'transaksi' => '',
            'detail_pengeluaran' => '',
            'gudang' => 'Total Pendapatan',
            'pendapatan' => format_uang($total_pendapatan),
        ];

        // dd($data);

        return $data;
    }


    public function data($awal, $akhir)
    {
        $data = $this->getData($awal, $akhir);

        return datatables()
            ->of($data)
            ->make(true);
    }


    public function exportPDF($awal, $akhir)
    {
        $data = $this->getData($awal, $akhir);
        $pdf = PDF::loadView('pages.laporan.pdf', compact('awal', 'akhir', 'data'));
        $pdf->setPaper('a4', 'portrait');
        return $pdf->stream('Laporan-pendapatan-' . date('Y-m-d-his') . '.pdf');
    }

    public function updatePeriode(Request $request)
    {
        // Lakukan validasi atau manipulasi data yang diterima dari permintaan
        $tanggalAwal = $request->input('tanggal_awal');
        $tanggalAkhir = $request->input('tanggal_akhir');
        // Lakukan operasi validasi atau manipulasi lainnya sesuai kebutuhan aplikasi Anda
        // Kemudian, Anda dapat merespons dengan sesuatu, misalnya berhasil atau gagal
        return response()->json(['success' => true]);
    }

    public function dataGudang($tanggal)
    {
        $gudang = GudangModel::whereDate('created_at', $tanggal)->get();
        return response()->json($gudang);
    }

    public function test()
    {
        $transaksi = TransaksiModel::all();
        $gudang = GudangModel::all();

        return view('pages.laporan.test', [
            'transaksi' => $transaksi,
            'gudang' => $gudang
        ]);
    }



}
