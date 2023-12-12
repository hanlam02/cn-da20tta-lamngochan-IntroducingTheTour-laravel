<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class imgtour extends Model
{
    protected $table ='images';
    protected $primaryKey = 'id';
    protected $fillable = ['id_tour','image_name','image_path'];

    public function tour()
    {
        return $this->belongsTo(Category::class, 'id_tour','id_tour');
    }
}
