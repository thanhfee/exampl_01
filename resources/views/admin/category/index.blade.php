@extends('layouts.admin.layout')

@section('title', 'Danh sách danh mục')

@section('content')
<div class="container-fluid pt-3"> 
    {{-- Hiển thị thông báo --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <h5><i class="icon fas fa-check"></i> Thành công!</h5>
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card card-outline card-primary"> 
        <div class="card-header">
            <h3 class="card-title text-bold">Quản lý danh mục sản phẩm</h3>
            <div class="card-tools">
                <a href="{{ route('category.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i> Thêm mới
                </a>
            </div>
        </div>
        
        <div class="card-body p-0">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th style="width: 50px">ID</th>
                        <th>Tên danh mục</th>
                        <th>Mô tả</th>
                        <th style="width: 120px">Trạng thái</th>
                        <th style="width: 150px">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td><strong>{{ $item->name }}</strong></td>
                        <td>{{ $item->description ?? 'Không có mô tả' }}</td>
                        <td>
                            @if($item->status == 1)
                                <span class="badge badge-success">Hiển thị</span>
                            @else
                                <span class="badge badge-danger">Ẩn</span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group">
                                {{-- Nút Sửa --}}
                                <a href="{{ route('category.edit', $item->id) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-edit"></i> Sửa
                                </a>

                                {{-- Nút Xóa (Dùng Form ẩn) --}}
                                <form action="{{ route('category.destroy', $item->id) }}" method="POST" 
                                      onsubmit="return confirm('Bạn có chắc chắn muốn xóa danh mục này?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger ml-1">
                                        <i class="fas fa-trash"></i> Xóa
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-4">
                            Dữ liệu trống. Hãy thêm danh mục đầu tiên!
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection