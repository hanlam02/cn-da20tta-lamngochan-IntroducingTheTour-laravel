<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log; // Thêm đoạn này

class Categorybooktour extends Model
{
    use HasFactory;
    protected $table ='booktour';
    protected $primaryKey = 'id_booktour';
  
    protected $fillable = [
                            'id_tour',
                            'id_contact',
                            'id_vnpay',
                            'quantityAdult',
                            'quantityChild',
                            'quantityBaby',
                            'total',
                            'status',
                            'created_at',
                            'updated_at',
                           ];
    
}
