<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detailangkutan extends Model
{
    use HasFactory;
    protected $table = 'detail_angkutan';
    protected $primaryKey = 'id_angkutan';
    protected $guarded;
}
