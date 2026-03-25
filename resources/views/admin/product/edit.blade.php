@extends('layouts.admin.layout')

@section('title', 'Chỉnh sửa sản phẩm')

@section('content')
<div class="container-fluid pt-3">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Chỉnh sửa sản phẩm: {{ $product->name }}</h3>
        </div>
        
        <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Tên sản phẩm</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                                   value="{{ old('name', $product->name) }}" placeholder="Nhập tên sản phẩm">
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label>Danh mục</label>
                            <select name="category_id" class="form-control">
                                <option value="">-- Chọn danh mục --</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}" {{ $product->category_id == $cat->id ? 'selected' : '' }}>
                                        {{ $cat->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Giá gốc (đ)</label>
                            <input type="number" name="price" class="form-control" value="{{ old('price', $product->price) }}">
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Giá khuyến mãi (đ)</label>
                            <input type="number" name="sale_price" class="form-control" value="{{ old('sale_price', $product->sale_price) }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Số lượng kho</label>
                    <input type="number" name="stock" class="form-control" value="{{ old('stock', $product->stock) }}">
                </div>

                <div class="form-group">
                    <label>Hình ảnh sản phẩm</label>
                    <div class="mb-2">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" width="150" class="img-thumbnail">
                            <p class="text-muted text-sm">Ảnh hiện tại</p>
                        @endif
                    </div>
                    <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Chọn ảnh mới (nếu muốn thay đổi)</label>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                <a href="{{ route('product.index') }}" class="btn btn-default">Quay lại</a>
            </div>
        </form>
    </div>
</div>
@endsection