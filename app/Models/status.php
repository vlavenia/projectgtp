<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class status extends Model
{
    use HasFactory;

    protected $fillable = [
        'status_id',
       
    ];

    public function jenis()
    {
        return $this->belongsTo(Jenis::class);
    }
}
