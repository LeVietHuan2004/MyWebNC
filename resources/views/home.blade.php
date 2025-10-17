@extends('layouts.app')

@section('content')
<div class="container py-4">
    {{-- Thông báo khi có message thành công --}}
    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <h1 class="text-center mb-4">Phụ kiện bia</h1>

    @if($products->count() > 0)
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100">
                        {{-- Ảnh sản phẩm --}}
                        <img src="{{ $product->image 
                            ? asset('storage/' . $product->image) 
                            : asset('images/default.png') }}" 
                            class="card-img-top" 
                            alt="{{ $product->name }}"
                            style="height: 250px; object-fit: cover;">

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-center">{{ $product->name }}</h5>
                            <p class="card-text text-muted text-center">{{ $product->description }}</p>
                            <p class="card-text text-center fw-bold text-danger">
                                {{ number_format($product->price, 0, ',', '.') }} VND
                            </p>
                            <div class="text-center mt-auto">
                                <a href="#" class="btn btn-primary w-100">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-center text-muted">Hiện chưa có sản phẩm nào được kích hoạt.</p>
    @endif
</div>
@endsection
