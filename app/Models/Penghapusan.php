<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penghapusan extends Model
{
    use HasFactory;

    protected $fillable = [
        'desc',
        'assetfk_id'
    ];

    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }
}
