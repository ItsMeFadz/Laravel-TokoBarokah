<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GudangModel extends Model
{
    use HasFactory;
    protected $table = 'gudang';
    protected $primaryKey = 'id_pengeluaran';

    protected $fillable = [
        'deskripsi',
        'nominal',
    ];
}
