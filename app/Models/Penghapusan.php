<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penghapusan extends Model
{
    use HasFactory;

    protected $table = 'penghapusan';
    // protected $guarded;

    protected $fillable = [
        'desc',
        'assetfk_id',
        'tanggal_penghapusan',
        'status',
        'user_id',
        'aset_id',
    ];

    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }
}
