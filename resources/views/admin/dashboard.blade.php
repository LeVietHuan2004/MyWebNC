<!-- resources/views/admin/dashboard.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Admin Dashboard</h1>
    <p>Chào mừng bạn đến trang quản trị!</p>

    <ul>
        <li><a href="{{ route('admin.products.index') }}">Quản lý sản phẩm</a></li>
        <!-- Thêm link admin khác nếu cần -->
    </ul>
</div>
@endsection
