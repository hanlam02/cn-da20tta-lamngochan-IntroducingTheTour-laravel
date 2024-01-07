<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table ='payment';
    protected $primaryKey = 'id_vnpay';
    protected $fillable = [
        'id_vnpay',
        'vnp_responsecode',
        'vnp_amount',
        'vnp_TxnRef',
    ];
}
