<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class objek extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_objek',
        'jenis_id'
    ];

    public function jenis()
    {
        return $this->belongsTo(Jenis::class);
    }
    
    public function assets()
    {
        return $this->hasMany(Asset::class, 'objek_id');
    }
}
