<?php 

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('home'); 
})->name('home');

Route::prefix('product')->group(function () {
    Route::get('/', function () {
        $products = [
            ['id' => 1, 'name' => 'iPhone 15'],
            ['id' => 2, 'name' => 'Samsung S24']
        ];
        return view('product.index', compact('products'));
    })->name('product.index');

    Route::get('/add', function () {
        return view('product.add');
    })->name('product.add');

    // Sửa đoạn này: Thay vì in ra text, ta redirect về danh sách
    Route::post('/add', function (Request $request) {
        // Trong thực tế, bạn sẽ viết lệnh lưu vào DB ở đây
        return redirect()->route('product.index')->with('success', 'Thêm sản phẩm thành công!');
    });

    Route::get('/{id?}', function ($id = '123') {
        return "Chi tiết sản phẩm ID: " . $id;
    })->where('id', '[A-Za-z0-9]+');
});

Route::get('/sinhvien/{name?}/{mssv?}', function ($name = "Phí Văn Thành", $mssv = "0149167") {
    return "Sinh viên: $name - MSSV: $mssv";
});

Route::get('/banco/{n}', function ($n) {
    return view('banco', ['n' => (int)$n]);
})->where('n', '[0-9]+');

Route::get('/go-home', function() {
    return redirect()->route('home');
});

Route::fallback(function () {
    return response()->view('error.404', [], 404);
});