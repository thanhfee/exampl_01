<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * Các thuộc tính có thể gán dữ liệu hàng loạt.
     */
    // app/Models/Product.php
protected $fillable = [
    'name', 
    'category_id', // Thêm dòng này
    'price', 
    'sale_price', 
    'stock', 
    'image', 
    'description',
    'is_active',
    'is_delete'
];

public function category() {
    return $this->belongsTo(Category::class);
}
}