<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Hiển thị danh sách
    public function index() {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    // Hiển thị form thêm
    public function create() {
        return view('product.add');
    }

    // Lưu dữ liệu
    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            // Lưu ảnh vào thư mục storage/app/public/products
            $path = $request->file('image')->store('products', 'public');
            $data['image'] = $path;
        }

        Product::create($data);
        return redirect()->route('product.index')->with('success', 'Thêm sản phẩm thành công!');
    }
}
