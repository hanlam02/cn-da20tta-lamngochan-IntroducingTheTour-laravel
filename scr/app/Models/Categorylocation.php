<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Categorylocation extends Model
{
    use HasFactory;
    protected $table ='location';
    protected $primaryKey = 'id_location';
    protected $fillable=[
        'id_location',
        'name_location'];
}
