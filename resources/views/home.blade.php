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
        h2 { color: #0984e3; }
        ul { list-style: none; padding: 0; }
        li {
            margin-bottom: 10px;
            padding: 10px;
            background: #dfe6e9;
            border-radius: 4px;
        }
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
        }
    </style>
</head>
<body>

<header>
    <h1>Chào mừng đến với Project Laravel của tôi</h1>
</header>

<div class="container">
    <h2>Danh mục chức năng</h2>
    <ul>
        <li>🚀 <a href="{{ route('product.index') }}">Quản lý Sản phẩm</a> (Xem danh sách & Thêm mới)</li>
        <li>🏁 <a href="{{ url('/banco/8') }}">Bàn cờ vua</a> (Kích thước n x n)</li>
        <li>👨‍🎓 <a href="{{ url('/sinhvien') }}">Thông tin Sinh viên</a></li>
        <li>⚠️ <a href="{{ url('/duong-dan-loi') }}">Thử nghiệm trang lỗi 404</a></li>
    </ul>

    <div class="info">
        <p>Sinh viên thực hiện: <strong>Phí Văn Thành</strong></p>
        <p>Mã số sinh viên: <strong>0149167</strong></p>
    </div>
</div>

</body>
</html>