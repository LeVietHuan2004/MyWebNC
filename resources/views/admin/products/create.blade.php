@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Thêm sản phẩm</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

   <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">

        @csrf

        <div class="form-group mb-3">
            <label for="name">Tên sản phẩm</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="description">Mô tả</label>
            <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label for="price">Giá (VND)</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="image">Ảnh sản phẩm</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" id="is_active" name="is_active" checked>
            <label class="form-check-label" for="is_active">Hiển thị trên trang chủ</label>
        </div>

        <button type="submit" class="btn btn-success">Lưu</button>
<a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Huỷ</a>
    </form>
</div>
@endsection
