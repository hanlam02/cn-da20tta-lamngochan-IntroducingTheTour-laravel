<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;
    protected $table ='tours';
    protected $primaryKey = 'id_tour'; // Đặt tên khóa chính của bảng 'tours'
    protected $fillable = ['id_tour', 'nametour', 'price', 'sale_price', 'itinerary', 'schedule', 'id_location', 'numberguests', 'vehicle', 'domain', 'description', 'image','stock'];



    public function productImages()
    {
        return $this->hasMany(imgtour::class, 'id_tour', 'id_tour');
    }
    // Xác định mối quan hệ với bảng 'locations'
    public function location()
    {
        return $this->belongsTo(Categorylocation::class, 'id_location', 'id_location');
    }

}
