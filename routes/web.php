<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Product;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 1. Trang chủ
Route::get('/', function () {
    return view('home');
})->name('home');

// 2. Route xác minh tuổi (Bắt buộc phải nằm ngoài nhóm check.age để tránh vòng lặp)
Route::middleware('auth')->group(function () {
    Route::get('/verify-age', function () {
        return view('auth.verify-age');
    })->name('age.verify');

    // CẬP NHẬT: Xử lý nhập số tuổi
    Route::post('/verify-age', function (Request $request) {
        $request->validate([
            'age' => 'required|numeric|min:18',
        ], [
            'age.required' => 'Vui lòng nhập số tuổi của bạn.',
            'age.numeric' => 'Tuổi phải là một chữ số.',
            'age.min' => 'Bạn phải từ 18 tuổi trở lên để truy cập hệ thống này!',
        ]);

        session(['age_verified' => true]);
        return redirect()->route('dashboard');
    })->name('age.verify.post');
});

// 3. Nhóm các route yêu cầu ĐĂNG NHẬP + XÁC MINH TUỔI (Sử dụng Middleware check.age)
Route::middleware(['auth', 'check.age'])->group(function () {
    
    // Dashboard
    Route::get('/dashboard', function () {
        $recentProducts = Product::latest()->take(5)->get();
        $totalProducts = Product::count();
        return view('dashboard', compact('recentProducts', 'totalProducts'));
    })->name('dashboard');

    // Quản lý Sản phẩm
    Route::prefix('product')->group(function () {
        
        Route::get('/', function () {
            $products = Product::all(); 
            return view('product.index', compact('products'));
        })->name('product.index');

        Route::get('/add', function () {
            return view('product.add');
        })->name('product.add');

        Route::post('/add', function (Request $request) {
            $request->validate([
                'name' => 'required',
                'price' => 'nullable|numeric|max:999999999999',
                'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            $data = $request->all();
            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('products', 'public');
                $data['image'] = $path;
            }

            Product::create($data);
            return redirect()->route('product.index')->with('success', 'Thêm sản phẩm thành công!');
        })->name('product.store');

        Route::get('/{id}', function ($id) {
            $product = Product::find($id);
            if (!$product) return abort(404);
            return "Chi tiết sản phẩm: " . $product->name . " - Giá: " . number_format($product->price) . " VNĐ";
        })->where('id', '[0-9]+');
    });

    // Bàn cờ
    Route::get('/banco/{n}', function ($n) {
        return view('banco', ['n' => (int)$n]);
    })->where('n', '[0-9]+');
});

// 4. Quản lý Hồ sơ người dùng (Breeze)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 5. Các route công khai khác
Route::get('/sinhvien/{name?}/{mssv?}', function ($name = "Phí Văn Thành", $mssv = "0149167") {
    return "Sinh viên: $name - MSSV: $mssv";
});

Route::get('/go-home', function() {
    return redirect()->route('home');
});

// 6. Xử lý lỗi 404
Route::fallback(function () {
    return response()->view('error.404', [], 404);
});

require __DIR__.'/auth.php';