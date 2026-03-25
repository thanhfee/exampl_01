@extends('layouts.admin.layout')

@section('title', 'Thêm danh mục mới')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <h1>Thêm Danh Mục</h1>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Nhập thông tin</h3>
            </div>
            
            <form action="{{ route('category.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Tên danh mục</label>
                        <input type="text" name="name" 
                               class="form-control @error('name') is-invalid @enderror" 
                               id="name" value="{{ old('name') }}" 
                               placeholder="Ví dụ: Quần Jean Nam">
                        @error('name')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Mô tả</label>
                        <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Trạng thái</label>
                        <select name="status" class="form-control">
                            <option value="1">Hiển thị</option>
                            <option value="0">Ẩn</option>
                        </select>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Lưu lại</button>
                    <a href="{{ route('category.index') }}" class="btn btn-default">Quay lại</a>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection