<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use PDF;
use App\Models\TransaksiModel; // Ganti dengan model yang sesuai
use App\Models\GudangModel;    // Ganti dengan model yang sesuai

class CreatePdfJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $awal;
    protected $akhir;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($awal, $akhir)
    {
        $this->awal = $awal;
        $this->akhir = $akhir;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Logika pembuatan file PDF
        $data = $this->getData($this->awal, $this->akhir);
        $pdf = PDF::loadView('laporan.pdf', compact('awal', 'akhir', 'data'));

        // Ganti path dengan yang sesuai, pastikan direktori sudah ada
        $pdfPath = storage_path('app/public/laporan/') . now()->format('Y-m-d-his') . '.pdf';

        $pdf->save($pdfPath);
    }

    /**
     * Metode getData - Logika untuk mendapatkan data
     */
    protected function getData($awal, $akhir)
    {
        $no = 1;
        $data = array();
        $pendapatan = 0;
        $total_pendapatan = 0;

        while (strtotime($awal) <= strtotime($akhir)) {
            $tanggal = $awal;
            $awal = date('Y-m-d', strtotime("+1 day", strtotime($awal)));

            $total_penjualan = TransaksiModel::where('created_at', 'LIKE', "%$tanggal%")->sum('bayar');
            $total_pengeluaran = GudangModel::where('created_at', 'LIKE', "%$tanggal%")->sum('nominal');

            $pendapatan = $total_penjualan - $total_pengeluaran;
            $total_pendapatan += $pendapatan;

            $row = array();
            $row['DT_RowIndex'] = $no++;
            $row['tanggal'] = tanggal_indonesia($tanggal, false);
            $row['transaksi'] = format_uang($total_penjualan);
            $row['gudang'] = format_uang($total_pengeluaran);
            $row['pendapatan'] = format_uang($pendapatan);

            $data[] = $row;
        }

        $data[] = [
            'DT_RowIndex' => '',
            'tanggal' => '',
            'transaksi' => '',
            'gudang' => 'Total Pendapatan',
            'pendapatan' => format_uang($total_pendapatan),
        ];

        return $data;
    }
}
