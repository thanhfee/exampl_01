<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #4f46e5;
            --primary-hover: #4338ca;
            --success: #10b981;
            --bg: #f8fafc;
            --text-main: #1e293b;
            --text-muted: #64748b;
        }

        body { 
            font-family: 'Inter', sans-serif; 
            background-color: var(--bg); 
            color: var(--text-main);
            margin: 0;
            display: flex;
            justify-content: center;
            padding: 40px 20px;
        }

        .main-card {
            background: white;
            width: 100%;
            max-width: 1000px;
            padding: 32px;
            border-radius: 24px;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05);
        }

        .header-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        h1 { 
            margin: 0; 
            font-size: 26px; 
            font-weight: 800; 
            background: linear-gradient(to r, var(--primary), #9333ea);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .alert { 
            padding: 16px; 
            background-color: #ecfdf5; 
            color: #065f46; 
            border: 1px solid #a7f3d0; 
            border-radius: 12px; 
            margin-bottom: 24px;
            font-size: 14px;
            font-weight: 500;
            display: flex;
            align-items: center;
        }

        .btn { 
            padding: 12px 24px; 
            background: var(--primary); 
            color: white; 
            text-decoration: none; 
            border-radius: 12px; 
            font-weight: 600;
            font-size: 14px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(79, 70, 229, 0.2);
        }

        .btn:hover { 
            background: var(--primary-hover); 
            transform: translateY(-2px);
            box-shadow: 0 8px 15px rgba(79, 70, 229, 0.3);
        }

        .table-container {
            overflow: hidden;
            border-radius: 16px;
            border: 1px solid #f1f5f9;
        }

        table { 
            width: 100%; 
            border-collapse: collapse; 
            text-align: left;
        }

        th { 
            background-color: #f8fafc; 
            padding: 16px;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--text-muted);
            font-weight: 700;
            border-bottom: 1px solid #f1f5f9;
        }

        td { 
            padding: 16px; 
            font-size: 15px;
            border-bottom: 1px solid #f8fafc;
            vertical-align: middle;
        }

        .product-img {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            object-fit: cover;
            border: 1px solid #e2e8f0;
        }

        .no-img {
            width: 60px;
            height: 60px;
            background: #f1f5f9;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 10px;
            color: #94a3b8;
        }

        .price-tag {
            font-weight: 700;
            color: var(--success);
        }

        .id-badge {
            background: #f1f5f9;
            padding: 4px 8px;
            border-radius: 6px;
            font-family: monospace;
            font-weight: 600;
            color: var(--text-muted);
        }

        .action-link {
            color: var(--primary);
            font-weight: 700;
            text-decoration: none;
            padding: 8px 16px;
            background: #f5f3ff;
            border-radius: 8px;
            transition: 0.2s;
        }

        .action-link:hover {
            background: var(--primary);
            color: white;
        }

        .footer-link { margin-top: 32px; text-align: center; }
        .footer-link a { color: var(--text-muted); text-decoration: none; font-weight: 500; }
    </style>
</head>
<body>
    <div class="main-card">
        <div class="header-section">
            <h1>Kho Sản Phẩm</h1>
            <a href="{{ route('product.add') }}" class="btn">+ Thêm Sản Phẩm</a>
        </div>
        
        @if(session('success'))
            <div class="alert">
                <svg style="width:20px;height:20px;margin-right:8px" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                {{ session('success') }}
            </div>
        @endif

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th style="width: 80px;">ID</th>
                        <th style="width: 100px;">Ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá bán</th>
                        <th style="text-align: right;">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $p)
                        <tr>
                            <td><span class="id-badge">#{{ $p->id }}</span></td>
                            <td>
                                @if($p->image)
                                    <img src="{{ asset('storage/' . $p->image) }}" class="product-img" alt="Product image">
                                @else
                                    <div class="no-img">NO IMG</div>
                                @endif
                            </td>
                            <td><span class="product-name" style="font-weight: 600;">{{ $p->name }}</span></td>
                            <td><span class="price-tag">{{ number_format($p->price) }}đ</span></td>
                            <td style="text-align: right;">
                                <a href="{{ url('/product/' . $p->id) }}" class="action-link">Chi tiết</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" style="text-align: center; padding: 60px; color: var(--text-muted);">
                                <p>📭 Hiện chưa có sản phẩm nào trong hệ thống.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="footer-link">
            <a href="{{ route('home') }}">← Quay lại trang chủ</a>
        </div>
    </div>
</body>
</html>