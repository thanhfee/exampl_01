<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller {
    public function index() {
        // Lấy tất cả danh mục từ DB
        $categories = Category::orderBy('id', 'desc')->get();
        
        // Trả về view và truyền biến $categories
        return view('admin.category.index', compact('categories'));
    }
    public function create()
{
    return view('admin.category.create');
}

public function store(Request $request)
{
    // 1. Kiểm tra dữ liệu (Validate)
    $request->validate([
        'name' => 'required|max:255',
        'status' => 'required|integer'
    ], [
        'name.required' => 'Vui lòng nhập tên danh mục',
    ]);

    // 2. Lưu vào Database
    \App\Models\Category::create($request->all());

    // 3. Quay lại trang danh sách với thông báo thành công
    return redirect()->route('category.index')->with('success', 'Thêm danh mục thành công!');
}
// 1. Hiện form sửa với dữ liệu cũ
public function edit($id) {
    $category = Category::findOrFail($id);
    return view('admin.category.edit', compact('category'));
}

// 2. Xử lý cập nhật vào Database
public function update(Request $request, $id) {
    $request->validate(['name' => 'required|max:255']);
    
    $category = Category::findOrFail($id);
    $category->update($request->all());
    
    return redirect()->route('category.index')->with('success', 'Cập nhật danh mục thành công!');
}

// 3. Xử lý xóa
public function destroy($id) {
    $category = Category::findOrFail($id);
    $category->delete();
    
    return redirect()->route('category.index')->with('success', 'Đã xóa danh mục!');
}
}