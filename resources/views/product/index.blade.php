<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        table { width: 60%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 12px; text-align: left; }
        th { background-color: #f4f4f4; }
        .btn { padding: 8px 15px; background: #28a745; color: white; text-decoration: none; border-radius: 4px; display: inline-block; }
        .btn:hover { background: #218838; }
        .alert { 
            padding: 15px; 
            background-color: #d4edda; 
            color: #155724; 
            border: 1px solid #c3e6cb; 
            border-radius: 4px; 
            margin-bottom: 20px; 
            width: 57%;
        }
    </style>
</head>
<body>
    <h1>Danh sách sản phẩm mẫu</h1>
    
    @if(session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('product.add') }}" class="btn">Thêm mới sản phẩm</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($products) && count($products) > 0)
                @foreach($products as $p)
                    <tr>
                        <td>{{ $p['id'] }}</td>
                        <td>{{ $p['name'] }}</td>
                        <td>
                            <a href="{{ url('/product/' . $p['id']) }}" style="color: #007bff;">Chi tiết</a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="3" style="text-align: center;">Không có sản phẩm nào.</td>
                </tr>
            @endif
        </tbody>
    </table>

    <p style="margin-top: 20px;"><a href="{{ route('home') }}">← Quay lại trang chủ</a></p>
</body>
</html>