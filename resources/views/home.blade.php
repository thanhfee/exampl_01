<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ - Laravel Project</title>
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
        }
        header {
            background: #2d3436;
            color: #fff;
            padding: 2rem;
            text-align: center;
        }
        .container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .auth-bar {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-bottom: 20px;
        }
        .btn-auth {
            padding: 8px 16px;
            border-radius: 4px;
            font-size: 14px;
            transition: 0.3s;
        }
        .btn-login { background: #0984e3; color: white !important; }
        .btn-register { background: #636e72; color: white !important; }
        .btn-dashboard { background: #27ae60; color: white !important; }
        
        h2 { color: #0984e3; border-bottom: 2px solid #eee; padding-bottom: 10px; }
        ul { list-style: none; padding: 0; }
        li {
            margin-bottom: 10px;
            padding: 12px;
            background: #dfe6e9;
            border-radius: 4px;
            transition: transform 0.2s;
        }
        li:hover { transform: translateX(5px); }
        a {
            text-decoration: none;
            color: #d63031;
            font-weight: bold;
        }
        a:hover { color: #ff7675; }
        .info {
            border-top: 2px solid #eee;
            margin-top: 20px;
            padding-top: 10px;
            font-style: italic;
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>
<body>

<header>
    <h1>Chào mừng đến với Project Laravel của tôi</h1>
</header>

<div class="container">
    <div class="auth-bar">
        @if (Route::has('login'))
            @auth
                <span>Chào, <strong>{{ Auth::user()->name }}</strong></span>
                <a href="{{ url('/dashboard') }}" class="btn-auth btn-dashboard">Vào Dashboard</a>
                <form method="POST" action="{{ route('logout') }}" style="display:inline">
                    @csrf
                    <a href="{{ route('logout') }}" class="btn-auth" style="color: #636e72" 
                       onclick="event.preventDefault(); this.closest('form').submit();">Đăng xuất</a>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn-auth btn-login">Đăng nhập</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn-auth btn-register">Đăng ký</a>
                @endif
            @endauth
        @endif
    </div>

    <h2>Danh mục chức năng</h2>
    <ul>
        <li>🚀 <a href="{{ route('product.index') }}">Quản lý Sản phẩm</a> (Xem danh sách & Thêm mới)</li>
        <li>🏁 <a href="{{ url('/banco/8') }}">Bàn cờ vua</a> (Kích thước n x n)</li>
        <li>👨‍🎓 <a href="{{ url('/sinhvien') }}">Thông tin Sinh viên</a></li>
        <li>⚠️ <a href="{{ url('/duong-dan-loi') }}">Thử nghiệm trang lỗi 404</a></li>
    </ul>

    <div class="info">
        <p>Sinh viên: <strong>Phí Văn Thành</strong></p>
        <p>MSSV: <strong>0149167</strong></p>
    </div>
</div>

</body>
</html>