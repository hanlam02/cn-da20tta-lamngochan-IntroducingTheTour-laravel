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
  
    protected $fillable = ['customer_name', 'email', 'phone', 'address', 'note', 'quantity', 'total', 'id_tour', 'payment', 'startdate', 'enddate'];
    

}
