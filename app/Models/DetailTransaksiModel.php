<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksiModel extends Model
{
    use HasFactory;
    protected $table = 'detail_transaksi';
    protected $primaryKey = 'id_detail_transaksi';
    protected $fillable = [
        'id_transaksi',
        'id_produk',
        'qty',
        'harga',
    ];

    // Relasi ke tabel Transaksi
    public function transaksi()
    {
        return $this->belongsTo(TransaksiModel::class, 'id_transaksi');
    }

    // Relasi ke tabel Produk
    public function produk()
    {
        return $this->belongsTo(ProdukModel::class, 'id_produk');
    }
}