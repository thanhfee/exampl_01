@extends('layouts.admin.layout')

@section('content')
<div class="card card-primary mt-3">
    <div class="card-header"><h3 class="card-title">Thêm sản phẩm mới</h3></div>
    
    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label>Tên sản phẩm</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Danh mục (Chọn từ danh sách)</label>
                <select name="category_id" class="form-control">
                    <option value="">-- Không có danh mục --</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label>Giá gốc</label>
                    <input type="number" name="price" class="form-control" value="0">
                </div>
                <div class="col-md-6">
                    <label>Giá sale</label>
                    <input type="number" name="sale_price" class="form-control">
                </div>
            </div>

            <div class="form-group mt-3">
                <label>Số lượng kho</label>
                <input type="number" name="stock" class="form-control" value="0">
            </div>

            <div class="form-group">
                <label>Ảnh sản phẩm</label>
                <input type="file" name="image" class="form-control-file">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Lưu sản phẩm</button>
        </div>
    </form>
</div>
@endsection