<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiModel extends Model
{
    use HasFactory;

    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $fillable = [
        'id_user',
        'details',
        'jumlah_item',
        'total_harga',
        'diskon',
        'bayar',
        'diterima',
        'kembali',
    ];

    protected $casts = [
        'details' => 'array',
    ];

    // Relasi ke tabel User
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    // Relasi ke tabel DetailTransaksi
    public function detailTransaksi()
    {
        return $this->hasMany(DetailTransaksiModel::class, 'id_transaksi');
    }

}