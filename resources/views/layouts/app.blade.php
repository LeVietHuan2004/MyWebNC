<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Dashboard - @yield('title')</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            min-height: 100vh;
            background-color: #343a40;
            color: white;
        }
        .sidebar a {
            color: #adb5bd;
            text-decoration: none;
        }
        .sidebar a:hover {
            color: white;
            background-color: #495057;
        }
        .sidebar .active {
            background-color: #495057;
            color: white;
        }
        .content {
            padding: 20px;
        }
        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
            color: white !important;
        }
    </style>
</head>
<body>

<div class="d-flex">

    <!-- Sidebar -->
    <nav class="sidebar flex-shrink-0 p-3">
        <a href="{{ route('admin.dashboard') }}" class="navbar-brand mb-3 d-block text-center">Admin Panel</a>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fa-solid fa-gauge"></i> Dashboard
                </a>
            </li>
            <li>
                <!-- Sửa link và routeIs cho admin resource -->
                <a href="{{ route('admin.products.index') }}" class="nav-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-box"></i> Quản lý sản phẩm
                </a>
            </li>
            <!-- Bạn có thể thêm mục khác ở đây -->
        </ul>
    </nav>

    <!-- Content -->
    <div class="content flex-grow-1">
        <!-- Navbar -->
        <nav class="navbar navbar-expand navbar-dark bg-dark mb-4">
            <div class="container-fluid">
                <span class="navbar-text text-white">
                    Xin chào, Admin!
                </span>
            </div>
        </nav>

        <!-- Nội dung chính -->
        <main>
            <h2 class="mb-4">@yield('title')</h2>

            @yield('content')
        </main>
    </div>

</div>

<!-- Bootstrap 5 JS (bao gồm Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
