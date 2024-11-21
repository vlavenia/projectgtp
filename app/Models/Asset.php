<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_barang',
        'kode_barang',
        'no_ba_terima',
        'tgl_ba_terima',
        'kategori_id',
        'asalUsul_id',
        'jenis_id',

    ];


    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function asal()
    {
        return $this->belongsTo(AsalUsul::class);
    }

    public function jenis()
    {
        return $this->belongsTo(Jenis::class);
    }


}
