<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm mới</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #4f46e5;
            --primary-hover: #4338ca;
            --bg: #f8fafc;
            --border: #e2e8f0;
        }

        body { 
            font-family: 'Inter', sans-serif; 
            background-color: var(--bg); 
            padding: 40px 20px; 
            margin: 0;
            color: #1e293b;
        }

        .container { 
            max-width: 550px; 
            margin: auto; 
            background: white; 
            padding: 32px; 
            border-radius: 24px; 
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05);
        }

        h2 { 
            margin: 0 0 24px 0; 
            font-size: 24px; 
            font-weight: 700; 
            text-align: center;
            color: #111827;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .form-group { margin-bottom: 20px; }

        label { 
            display: block; 
            font-weight: 600; 
            margin-bottom: 8px; 
            font-size: 14px;
            color: #475569;
        }

        input[type="text"], 
        input[type="number"], 
        input[type="file"],
        textarea { 
            width: 100%; 
            padding: 12px 16px; 
            box-sizing: border-box; 
            border: 1px solid var(--border); 
            border-radius: 12px; 
            font-size: 15px;
            transition: all 0.2s;
            background: #fff;
        }

        input:focus, textarea:focus { 
            outline: none; 
            border-color: var(--primary); 
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1); 
        }

        /* Upload area styling */
        .upload-wrapper {
            position: relative;
            border: 2px dashed var(--border);
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            transition: 0.2s;
        }

        .upload-wrapper:hover { border-color: var(--primary); background: #f5f3ff; }

        #img-preview { 
            margin: 15px auto 0; 
            max-width: 100%; 
            height: 180px; 
            object-fit: cover; 
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);
        }

        .btn-submit { 
            width: 100%;
            background-color: var(--primary); 
            color: white; 
            border: none; 
            padding: 14px; 
            cursor: pointer; 
            border-radius: 12px; 
            font-size: 16px; 
            font-weight: 700;
            transition: 0.2s;
            margin-top: 10px;
        }

        .btn-submit:hover { 
            background-color: var(--primary-hover); 
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.3);
        }

        .back-link { 
            display: block; 
            text-align: center; 
            margin-top: 20px; 
            color: #64748b; 
            text-decoration: none; 
            font-size: 14px;
            font-weight: 500;
        }

        .back-link:hover { color: var(--primary); }

        /* Hiển thị lỗi */
        .error-msg {
            color: #ef4444;
            font-size: 13px;
            margin-top: 4px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>🚀 Thêm sản phẩm mới</h2>

    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group">
            <label for="name">Tên sản phẩm</label>
            <input type="text" id="name" name="name" placeholder="Ví dụ: iPhone 15 Pro Max" required>
            @error('name') <span class="error-msg">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="price">Giá bán (VNĐ)</label>
            <input type="number" id="price" name="price" placeholder="Nhập số tiền...">
        </div>

        <div class="form-group">
            <label for="image">Hình ảnh sản phẩm</label>
            <div class="upload-wrapper">
                <input type="file" id="image" name="image" accept="image/*" onchange="previewImage(event)">
                <img id="img-preview" style="display:none;">
                <p id="upload-hint" style="font-size: 12px; color: #94a3b8; margin-top: 8px;">Nhấn để chọn ảnh (JPG, PNG)</p>
            </div>
        </div>

        <div class="form-group">
            <label for="description">Mô tả sản phẩm</label>
            <textarea id="description" name="description" rows="3" placeholder="Thông số kỹ thuật, tình trạng..."></textarea>
        </div>

        <button type="submit" class="btn-submit">Xác nhận Lưu</button>
    </form>

    <a href="{{ route('product.index') }}" class="back-link">← Quay lại danh sách sản phẩm</a>
</div>

<script>
    function previewImage(event) {
        const reader = new FileReader();
        const hint = document.getElementById('upload-hint');
        const output = document.getElementById('img-preview');
        
        reader.onload = function() {
            output.src = reader.result;
            output.style.display = 'block';
            hint.style.display = 'none';
        };
        
        if(event.target.files[0]) {
            reader.readAsDataURL(event.target.files[0]);
        }
    }
</script>

</body>
</html>