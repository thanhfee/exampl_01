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
    protected $fillable = [
        'name',
        'price',
        'description',
        'image',
    ]; // Dòng này phải nằm TRONG dấu ngoặc nhọn của class
}