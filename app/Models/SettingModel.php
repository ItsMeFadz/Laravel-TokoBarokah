<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingModel extends Model
{
    protected $table = 'setting';
    protected $primaryKey = 'id_setting';

    protected $fillable = [
        'nama_perusahaan',
        'alamat',
        'telepon',
        'path_logo',
    ];
}


