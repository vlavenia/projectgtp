<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class asal extends Model
{
    use HasFactory;

    protected $fillable =[
        'nama_asal'
    ];

    public function assets()
    {
        return $this->hasMany(Asset::class);
    }
}
