@extends('layouts.admin.layout')

@section('title', 'Quản lý sản phẩm')

@section('content')
<style>
    :root {
        --primary: #4f46e5;
        --price: #ee4d2d;
        --text-main: #1e293b;
        --text-muted: #64748b;
    }

    .header-section {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: white;
        padding: 20px;
        border-radius: 8px;
        margin-bottom: 20px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    }

    /* Grid hệ thống sản phẩm */
    .product-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
        gap: 20px;
        padding-bottom: 30px;
    }

    .product-card {
        background: white;
        border-radius: 12px;
        padding: 10px;
        transition: all 0.3s ease;
        border: 1px solid #eee;
        position: relative;
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        border-color: var(--primary);
    }

    .img-wrapper {
        width: 100%;
        aspect-ratio: 1/1;
        border-radius: 8px;
        overflow: hidden;
        background: #f8fafc;
        margin-bottom: 10px;
    }

    .product-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .product-info { padding: 5px; }

    .product-name {
        font-size: 14px;
        font-weight: 600;
        color: var(--text-main);
        height: 40px;
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        margin-bottom: 8px;
    }

    .price-group {
        display: flex;
        align-items: baseline;
        gap: 8px;
    }

    .product-price {
        font-size: 16px;
        font-weight: 800;
        color: var(--price);
    }

    .old-price {
        font-size: 12px;
        color: var(--text-muted);
        text-decoration: line-through;
    }

    /* Nút hành động đè lên card hoặc để dưới */
    .card-actions {
        margin-top: 10px;
        display: flex;
        gap: 5px;
    }
</style>

<div class="container-fluid pt-3">
    {{-- Thanh tiêu đề và nút thêm --}}
    <div class="header-section">
        <div>
            <h3 class="m-0 font-weight-bold"><i class="fas fa-cubes mr-2"></i>KHO SẢN PHẨM</h3>
            <span class="text-muted text-sm">Tổng cộng: {{ $products->count() }} mặt hàng</span>
        </div>
        <a href="{{ route('product.create') }}" class="btn btn-primary shadow-sm">
            <i class="fas fa-plus-circle mr-1"></i> THÊM MỚI
        </a>
    </div>

    {{-- Hiển thị thông báo thành công --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle mr-1"></i> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    {{-- Lưới sản phẩm --}}
    <div class="product-grid">
        @forelse($products as $p)
            <div class="product-card">
                <div class="img-wrapper">
                    @if($p->image)
                        <img src="{{ asset('storage/' . $p->image) }}" class="product-img" alt="{{ $p->name }}">
                    @else
                        <div class="d-flex align-items:center justify-content:center h-100 bg-light text-muted">
                            <i class="fas fa-image fa-2x"></i>
                        </div>
                    @endif
                </div>
                
                <div class="product-info">
                    <div class="product-name">{{ $p->name }}</div>
                    
                    <div class="price-group">
                        <span class="product-price">
                            {{ number_format($p->sale_price ?? $p->price, 0, ',', '.') }}đ
                        </span>
                        @if($p->sale_price)
                            <span class="old-price">{{ number_format($p->price, 0, ',', '.') }}đ</span>
                        @endif
                    </div>

                    <div class="mt-2 text-sm text-muted">
                        <i class="fas fa-tag mr-1"></i> {{ $p->category->name ?? 'Chưa phân loại' }}
                    </div>

                    <div class="card-actions">
                        <a href="{{ route('product.edit', $p->id) }}" class="btn btn-sm btn-outline-info flex-grow-1">
                            <i class="fas fa-edit"></i> Sửa
                        </a>
                        <form action="{{ route('product.destroy', $p->id) }}" method="POST" 
                              class="flex-grow-1" onsubmit="return confirm('Xóa sản phẩm này?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger w-100">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5 bg-white rounded shadow-sm">
                <img src="https://cdn-icons-png.flaticon.com/512/4076/4076432.png" width="100" class="mb-3 opacity-50">
                <p class="text-muted">Chưa có sản phẩm nào trong kho hàng của bạn.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection