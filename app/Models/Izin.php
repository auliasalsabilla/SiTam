<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class izin extends Model
{
    protected $fillable = [
        'nama', 'jenis_izin', 'tanggal_mulai', 'tanggal_selesai', 'keterangan'
    ];
}
