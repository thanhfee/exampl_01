<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Không tìm thấy trang</title>
    <style>
        /* Cấu hình giao diện tổng thể */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }

        .container {
            text-align: center;
        }

        /* Hiệu ứng số 404 lớn */
        h1 {
            font-size: 120px;
            margin: 0;
            color: #e74c3c;
            text-shadow: 2px 2px 10px rgba(0,0,0,0.1);
        }

        h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        p {
            color: #666;
            margin-bottom: 30px;
        }

        /* Nút quay lại trang chủ */
        .btn-home {
            text-decoration: none;
            background-color: #3498db;
            color: white;
            padding: 12px 25px;
            border-radius: 50px;
            transition: background-color 0.3s ease;
            box-shadow: 0 4px 15px rgba(52, 152, 219, 0.3);
        }

        .btn-home:hover {
            background-color: #2980b9;
        }

        /* Hình ảnh minh họa đơn giản bằng CSS */
        .icon {
            font-size: 80px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="icon">🔍</div>
        <h1>404</h1>
        <h2>Oops! Không tìm thấy trang này rồi bạn ơi!</h2>
        <p>Đường dẫn bạn truy cập không tồn tại hoặc đã bị di chuyển.</p>
        
        <a href="{{ route('home') }}" class="btn-home">Quay lại trang chủ</a>
    </div>

</body>
</html>