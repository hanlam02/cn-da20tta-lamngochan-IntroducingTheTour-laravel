<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class passen extends Model
{
    use HasFactory;
    protected $table='passengerinfo';
    protected $primaryKey = 'id_passen';
    
    protected $fillable = [
        'id_passen', 'id_contact','name' ,'gender', 'Type_guest', 'note'
    ] ;
}
