<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // 1. Danh sách sản phẩm (Chỉ lấy sản phẩm chưa bị xóa mềm)
    public function index()
    {
        $products = Product::where('is_delete', 0)
            ->with('category')
            ->latest()
            ->get();
            
        return view('admin.product.index', compact('products'));
    }

    // 2. Hiển thị form thêm mới
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
    }

    // 3. Lưu sản phẩm mới
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0|lte:price',
            'stock' => 'required|integer|min:0',
            'category_id' => 'nullable|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ], [
            'name.required' => 'Vui lòng nhập tên sản phẩm.',
            'sale_price.lte' => 'Giá khuyến mãi không được lớn hơn giá gốc.',
            'image.max' => 'Ảnh không được vượt quá 2MB.'
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        Product::create($data);
        return redirect()->route('product.index')->with('success', 'Thêm sản phẩm thành column thành công!');
    }

    // 4. Hiển thị form chỉnh sửa
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.product.edit', compact('product', 'categories'));
    }

    // 5. Cập nhật sản phẩm
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0|lte:price',
            'stock' => 'required|integer|min:0',
            'category_id' => 'nullable|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ], [
            'sale_price.lte' => 'Giá khuyến mãi không được lớn hơn giá gốc.'
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            // Xóa ảnh cũ trong thư mục storage để tiết kiệm bộ nhớ (tùy chọn)
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $data['image'] = $request->file('image')->store('products', 'public');
        } else {
            // Nếu không chọn ảnh mới, giữ nguyên đường dẫn ảnh cũ
            $data['image'] = $product->image;
        }

        $product->update($data);
        return redirect()->route('product.index')->with('success', 'Cập nhật sản phẩm thành công!');
    }

    // 6. Xóa mềm (Đổi trạng thái is_delete)
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        
        // Không xóa khỏi database, chỉ đánh dấu là đã xóa
        $product->update(['is_delete' => 1]);
        
        return redirect()->route('product.index')->with('success', 'Sản phẩm đã được đưa vào thùng rác!');
    }
}