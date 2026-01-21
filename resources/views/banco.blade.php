<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bàn cờ vua {{ $n }}x{{ $n }}</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        table {
            border: 2px solid #333;
            border-collapse: collapse;
        }
        td {
            width: 50px;
            height: 50px;
            text-align: center;
        }
        .white {
            background-color: #fff;
        }
        .black {
            background-color: #999; /* Màu đen/xám cho ô cờ */
        }
        h1 {
            color: #333;
        }
    </style>
</head>
<body>
    <h1>Bàn cờ kích thước {{ $n }} x {{ $n }}</h1>

    <table>
        @for ($i = 0; $i < $n; $i++)
            <tr>
                @for ($j = 0; $j < $n; $j++)
                    {{-- Logic: Nếu tổng chỉ số hàng và cột là số chẵn thì màu trắng, lẻ thì màu đen --}}
                    <td class="{{ ($i + $j) % 2 == 0 ? 'white' : 'black' }}">
                        {{-- Bạn có thể để trống hoặc hiển thị tọa độ để kiểm tra --}}
                        {{-- {{ $i }},{{ $j }} --}}
                    </td>
                @endfor
            </tr>
        @endfor
    </table>

    <p style="margin-top: 20px;">
        <a href="{{ route('home') }}">Quay lại trang chủ</a>
    </p>
</body>
</html>