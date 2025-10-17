@extends('layouts.app')

@section('title', 'Danh sách sản phẩm')

@section('content')
    <div class="mb-3 text-end">
        <a href="{{ route('admin.products.create') }}" class="btn btn-success">
    <i class="fa-solid fa-plus"></i> Thêm sản phẩm mới
</a>

    </div>

    <table class="table table-bordered table-striped table-hover align-middle">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Hiển thị</th>
                <th>Ảnh</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ number_format($product->price, 0, ',', '.') }} ₫</td>
                <td>
                    @if($product->is_active)
                        <span class="badge bg-success">Hiện</span>
                    @else
                        <span class="badge bg-secondary">Ẩn</span>
                    @endif
                </td>
                <td>
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="width: 80px; height: auto;">
                    @else
                        <span class="text-muted">Chưa có ảnh</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-warning">
                        <i class="fa-solid fa-pen-to-square"></i> Sửa
                    </a>
                    <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline" onsubmit="return confirm('Bạn có chắc chắn muốn xoá sản phẩm này?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" type="submit">
                            <i class="fa-solid fa-trash"></i> Xóa
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">Chưa có sản phẩm nào.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
@endsection
