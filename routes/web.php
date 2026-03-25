<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| 1. ROUTES CÔNG KHAI (Không cần đăng nhập)
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/sinhvien/{name?}/{mssv?}', function ($name = "Phí Văn Thành", $mssv = "0149167") {
    return "Sinh viên: $name - MSSV: $mssv";
});

Route::get('/go-home', function() {
    return redirect()->route('home');
});

/*
|--------------------------------------------------------------------------
| 2. ROUTES XÁC THỰC & XÁC MINH TUỔI
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    // Trang nhập tuổi
    Route::get('/verify-age', function () {
        return view('auth.verify-age');
    })->name('age.verify');

    Route::post('/verify-age', function (Request $request) {
        $request->validate([
            'age' => 'required|numeric|min:18',
        ], [
            'age.required' => 'Vui lòng nhập số tuổi của bạn.',
            'age.min' => 'Bạn phải từ 18 tuổi trở lên để truy cập!'
        ]);
        session(['age_verified' => true]);
        return redirect()->route('dashboard');
    })->name('age.verify.post');
});

/*
|--------------------------------------------------------------------------
| 3. NHÓM ĐÃ XÁC THỰC (Dashboard & Profile)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'check.age'])->group(function () {
    
    Route::get('/dashboard', function () {
        $recentProducts = Product::latest()->take(5)->get();
        $totalProducts = Product::count();
        return view('dashboard', compact('recentProducts', 'totalProducts'));
    })->name('dashboard');

    // Profile người dùng
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /*
    |--------------------------------------------------------------------------
    | 4. HỆ THỐNG QUẢN TRỊ ADMIN (Tất cả nằm trong /admin/...)
    |--------------------------------------------------------------------------
    */
    Route::prefix('admin')->group(function () {
        
        // Quản lý Danh mục
        Route::prefix('category')->name('category.')->group(function () {
            Route::get('/', [CategoryController::class, 'index'])->name('index');
            Route::get('/create', [CategoryController::class, 'create'])->name('create');
            Route::post('/store', [CategoryController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('edit');
            Route::put('/{id}/update', [CategoryController::class, 'update'])->name('update');
            Route::delete('/{id}/destroy', [CategoryController::class, 'destroy'])->name('destroy');
        });

        // Quản lý Sản phẩm (Đã chuyển hết vào ProductController)
        Route::prefix('product')->name('product.')->group(function () {
            Route::get('/', [ProductController::class, 'index'])->name('index');
            Route::get('/create', [ProductController::class, 'create'])->name('create');
            Route::post('/store', [ProductController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('edit');
            Route::put('/{id}/update', [ProductController::class, 'update'])->name('update');
            Route::delete('/{id}/destroy', [ProductController::class, 'destroy'])->name('destroy');
        });
    });

    // Các tính năng khác
    Route::get('/banco/{n}', function ($n) {
        return view('banco', ['n' => (int)$n]);
    })->where('n', '[0-9]+');
});

/*
|--------------------------------------------------------------------------
| 5. CHI TIẾT SẢN PHẨM (Dành cho khách xem)
|--------------------------------------------------------------------------
*/
Route::get('/product/{id}', function ($id) {
    $product = Product::find($id);
    if (!$product) return abort(404);
    return view('product.detail', compact('product'));
})->where('id', '[0-9]+')->name('product.show');

// Xử lý lỗi 404
Route::fallback(function () {
    return response()->view('error.404', [], 404);
});

require __DIR__.'/auth.php';