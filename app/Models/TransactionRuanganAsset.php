<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionRuanganAsset extends Model
{
    use HasFactory;
    protected $table = 'transaction_ruangan_assets';
    protected $guarded;
}
