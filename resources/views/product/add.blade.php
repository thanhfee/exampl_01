<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm mới</title>
    <style>
        body { font-family: sans-serif; padding: 20px; line-height: 1.6; }
        .container { max-width: 500px; margin: auto; border: 1px solid #ddd; padding: 20px; border-radius: 8px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; font-weight: bold; margin-bottom: 5px; }
        input[type="text"], input[type="number"], textarea { 
            width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; 
        }
        .btn-submit { background-color: #28a745; color: white; border: none; padding: 10px 15px; cursor: pointer; border-radius: 4px; }
        .btn-submit:hover { background-color: #218838; }
        .back-link { display: inline-block; margin-top: 15px; color: #007bff; text-decoration: none; }
    </style>
</head>
<body>

<div class="container">
    <h2>Thêm sản phẩm mới</h2>
    <form action="#" method="POST">
        {{-- CSRF Token là bắt buộc trong Laravel khi dùng POST --}}
        @csrf
        
        <div class="form-group">
            <label for="name">Tên sản phẩm:</label>
            <input type="text" id="name" name="name" placeholder="Ví dụ: iPhone 15" required>
        </div>

        <div class="form-group">
            <label for="price">Giá bán:</label>
            <input type="number" id="price" name="price" placeholder="Nhập giá sản phẩm">
        </div>

        <div class="form-group">
            <label for="description">Mô tả:</label>
            <textarea id="description" name="description" rows="4"></textarea>
        </div>

        <button type="submit" class="btn-submit">Lưu sản phẩm</button>
    </form>

    <a href="{{ route('product.index') }}" class="back-link">← Quay lại danh sách</a>
</div>

</body>
</html>