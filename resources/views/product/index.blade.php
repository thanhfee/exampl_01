<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #4f46e5;
            --primary-hover: #4338ca;
            --bg: #f8fafc;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --price: #ee4d2d;
        }

        body { 
            font-family: 'Inter', sans-serif; 
            background-color: var(--bg); 
            color: var(--text-main);
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
        }

        /* Breadcrumb */
        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 12px;
            color: var(--text-muted);
            margin-bottom: 12px;
        }
        .breadcrumb a {
            text-decoration: none;
            color: inherit;
            transition: color 0.2s;
        }
        .breadcrumb a:hover { color: var(--primary); }

        /* Header Section Mới */
        .header-section {
            display: flex;
            justify-content: space-between;
            align-items: flex-end; /* Căn chỉnh chân dòng */
            margin-bottom: 32px;
            padding-bottom: 16px;
            border-bottom: 2px solid #e2e8f0;
        }

        .title-group {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .title-icon {
            background: var(--primary);
            color: white;
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            box-shadow: 0 10px 15px -3px rgba(79, 70, 229, 0.3);
        }

        h1 { 
            margin: 0; 
            font-size: 24px; 
            font-weight: 800; 
            color: var(--text-main);
            text-transform: uppercase;
            letter-spacing: -0.02em;
        }

        .count-badge {
            font-size: 11px;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.1em;
            font-weight: 700;
            margin-top: 2px;
            display: block;
        }

        .btn-add { 
            padding: 12px 24px; 
            background: var(--primary); 
            color: white; 
            text-decoration: none; 
            border-radius: 12px; 
            font-weight: 700;
            font-size: 14px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn-add:hover { 
            background: var(--primary-hover);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(79, 70, 229, 0.2);
        }

        /* Product Grid */
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 24px;
        }

        .product-card {
            background: white;
            border-radius: 16px;
            padding: 12px;
            border: 1px solid #f1f5f9;
            transition: all 0.3s ease;
            text-decoration: none;
            color: inherit;
            display: flex;
            flex-direction: column;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.05);
            border-color: var(--primary);
        }

        .img-wrapper {
            width: 100%;
            aspect-ratio: 1/1;
            border-radius: 10px;
            overflow: hidden;
            background: #f8fafc;
            margin-bottom: 12px;
        }

        .product-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .product-name {
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 8px;
            line-height: 1.4;
            height: 40px;
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }

        .product-price {
            font-size: 16px;
            font-weight: 800;
            color: var(--price);
        }

        .footer-link { margin-top: 40px; text-align: center; }
        .footer-link a { color: var(--text-muted); text-decoration: none; font-size: 13px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ route('home') }}">Trang chủ</a>
            <span>/</span>
            <span>Danh sách sản phẩm</span>
        </div>

        <div class="header-section">
            <div class="title-group">
                <div class="title-icon">
                    <i class="fa-solid fa-bag-shopping"></i>
                </div>
                <div>
                    <h1>Danh Sách Sản Phẩm</h1>
                    <span class="count-badge">Kho: {{ $products->count() }} mặt hàng</span>
                </div>
            </div>
            
            <a href="{{ route('product.add') }}" class="btn-add">
                <i class="fa-solid fa-plus"></i> Thêm Mới
            </a>
        </div>
        
        @if(session('success'))
            <div style="background: #ecfdf5; color: #065f46; padding: 14px; border-radius: 10px; margin-bottom: 24px; font-size: 14px; border: 1px solid #a7f3d0;">
                <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
            </div>
        @endif

        <div class="product-grid">
            @forelse($products as $p)
                <a href="{{ url('/product/' . $p->id) }}" class="product-card">
                    <div class="img-wrapper">
                        @if($p->image)
                            <img src="{{ asset('storage/' . $p->image) }}" class="product-img" alt="{{ $p->name }}">
                        @else
                            <div style="width:100%; height:100%; display:flex; align-items:center; justify-content:center; background:#f1f5f9; color:#cbd5e1; font-size:10px; font-weight:bold;">NO IMAGE</div>
                        @endif
                    </div>
                    
                    <div class="product-info">
                        <div class="product-name">{{ $p->name }}</div>
                        <div class="product-price">{{ number_format($p->price, 0, ',', '.') }}đ</div>
                    </div>
                </a>
            @empty
                <div style="grid-column: 1/-1; text-align: center; padding: 60px; background: white; border-radius: 20px; border: 2px dashed #e2e8f0; color: var(--text-muted);">
                    <i class="fa-solid fa-box-open" style="font-size: 40px; margin-bottom: 10px;"></i>
                    <p>Kho hàng hiện đang trống.</p>
                </div>
            @endforelse
        </div>

        <div class="footer-link">
            <a href="{{ route('home') }}"><i class="fa-solid fa-arrow-left"></i> Quay lại trang chủ</a>
        </div>
    </div>
</body>
</html>