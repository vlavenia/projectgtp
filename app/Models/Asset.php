<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asset extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nama_barang',
        'kode_barang',
        'no_ba_terima',
        'tgl_ba_terima',
        'kategori_id',
        'asal_id',
        'jenis_id',
        'status_asset'
    ];
    protected $dates = ['deleted_at'];


    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }


    public function asal()
    {
        return $this->belongsTo(asal::class);
    }

    public function jenis()
    {
        return $this->belongsTo(Jenis::class);
    }

    //relasi tabel dr penghapusan
    // public function penghapusan()
    // {
    //     return $this->hasMany(Penghapusan::class);
    // }

    public function statusAsset()
    {
        return $this->belongsTo(statusAsset::class);
    }
}
