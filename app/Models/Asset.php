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
        'jenis_id',
        'objek_id',
        'kategori_id',
        'asal_id',
        'img_url',
        'no_ba_terima',
        'tgl_ba_terima',
        'no_register',
        'merk',
        'bahan',
        'thn_pmbelian',
        'pabrik',
        'rangka',
        'mesin',
        'polisi',
        'bpkb',
        'harga',
        'deskripsi_brg',
        'keterangan',
        'opd',
        'status_id',
        'unit_id',
        'klasifikasi_id',

    ];
    protected $dates = ['deleted_at'];


    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }


    public function asal()
    {
        return $this->belongsTo(asal::class, 'asal_id');
    }

    public function jenis()
    {
        return $this->belongsTo(Jenis::class);
    }

    public function statusAsset()
    {
        return $this->belongsTo(status::class);
    }

    public function objek()
    {
        return $this->belongsTo(Objek::class);
    }
}
