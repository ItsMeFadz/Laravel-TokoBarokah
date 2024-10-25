<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukModel extends Model
{
    use HasFactory;
    protected $table = 'produk';
    protected $primaryKey = 'id_produk';

    protected $fillable = [
        'id_kategori',
        'id_satuan',
        'nama_produk',
        'merk',
        'harga_beli',
        'diskon',
        'harga_jual',
        'stok',
        'gambar',
        'link',
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriModel::class, 'id_kategori', 'id_kategori');
    }
    public function satuan()
    {
        return $this->belongsTo(SatuanModel::class, 'id_satuan', 'id_satuan');
    }

    // Model ProdukModel

    public static function getIdFromName($nama_produk) {
        return self::where('nama_produk', $nama_produk)->value('id_produk');
    }

    public static function updateStok($id_produk, $qty)
    {
        $produk = self::find($id_produk);

        if ($produk) {
            $produk->stok -= $qty;
            $produk->save();
        }
    }

}