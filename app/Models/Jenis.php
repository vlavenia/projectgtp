<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    use HasFactory;
    protected $fillable = ['jenis_asset'];

    // public function assets()
    // {
    //     return $this->hasMany(Asset::class);
    // }

    public function objek()
    {
        return $this->hasMany(Objek::class);
    }
}
