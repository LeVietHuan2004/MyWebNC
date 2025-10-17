<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BilliardGear — Phụ Kiện Billiards Chuyên Nghiệp</title>
    @vite('resources/css/app.css')
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<body class="bg-zinc-50 text-zinc-900">

    {{-- Thanh navbar --}}
    <nav class="bg-amber-800 text-white px-8 py-4 flex justify-between items-center shadow-lg">
        <h1 class="text-2xl font-bold tracking-wider"><i class="fas fa-cue-ball mr-2"></i>BilliardGear</h1>
        <ul class="flex space-x-8">
            <li><a href="#" class="hover:text-yellow-300 transition">Trang chủ</a></li>
            <li><a href="#" class="hover:text-yellow-300 transition">Sản phẩm</a></li>
            <li><a href="#" class="hover:text-yellow-300 transition">Về chúng tôi</a></li>
            <li><a href="#" class="hover:text-yellow-300 transition">Liên hệ</a></li>
        </ul>
        <div>
            <a href="{{ route('login') }}"
                class="px-4 py-2 bg-yellow-400 text-black rounded-lg font-semibold hover:bg-yellow-300 transition">Đăng
                xuất</a>
        </div>
    </nav>

    {{-- Hero Section --}}
    <section class="relative bg-cover bg-center h-[500px]"
        style="background-image: url('https://tse3.mm.bing.net/th/id/OIP.soq7TyU__Gw6b2jabqcqkgHaE8?pid=Api&P=0&h=180');">
        <div class="absolute inset-0 bg-black/60 flex flex-col justify-center items-center text-center text-white">
            <h2 class="text-5xl font-extrabold mb-4 drop-shadow-lg">Phụ Kiện Billiards — Đẳng Cấp Dành Cho Dân Chơi Thật
                Sự</h2>
            <p class="text-lg mb-6 max-w-2xl">Khám phá bộ sưu tập gậy, bóng, bàn và nhiều phụ kiện billiards chất lượng
                — chuẩn phong cách quán billiards ngay tại nhà.</p>
            <a href="#"
                class="bg-yellow-500 text-black px-6 py-3 font-semibold rounded-lg hover:bg-yellow-400 transition">Khám
                phá ngay</a>
        </div>
    </section>

    {{-- Danh mục nổi bật --}}
    <section class="py-16 bg-white">
        <h3 class="text-3xl font-bold text-center mb-10 text-amber-800">Danh Mục Nổi Bật</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto px-4">
            @foreach ($products as $item)
                        <div class="bg-zinc-100 rounded-2xl shadow hover:shadow-xl transition overflow-hidden">

                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}"
                                class="gently-rounded-image" />


                            <div class="p-5 text-center">
                                <h4 class="text-xl font-semibold mb-2">{{ $item->name }}</h4>
                                <h4 class="text-xl font-semibold mb-2">{{ $item->price }}</h4>
                                <h4 class="text-xl font-semibold mb-2">{{ $item->description }}</h4>
                                <button type="submit" style="
                    border: 2px solid #28a745; 
                    background-color: #fff; 
                    color: #28a745; 
                    padding: 10px 20px; 
                    border-radius: 8px; 
                    font-weight: bold; 
                    cursor: pointer;
                    transition: all 0.3s ease;
                " onmouseover="this.style.backgroundColor='#28a745'; this.style.color='#fff'; this.style.boxShadow='0 4px 10px rgba(0,0,0,0.2)';"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.color='#28a745'; this.style.boxShadow='none';">Mua</button>

                            </div>
                        </div>
            @endforeach
        </div>
    </section>

    {{-- Ưu đãi --}}
    <section class="py-16 bg-gradient-to-r from-amber-700 to-yellow-600 text-white text-center">
        <h3 class="text-4xl font-bold mb-4">🎉 Ưu Đãi Cuối Tuần 🎉</h3>
        <p class="text-lg mb-8">Giảm đến <span class="font-bold text-2xl">50%</span> cho tất cả phụ kiện billiards!</p>
        <a href="#"
            class="bg-white text-amber-800 font-semibold px-6 py-3 rounded-lg hover:bg-yellow-100 transition">Mua
            Ngay</a>
    </section>

    {{-- Footer --}}
    <footer class="bg-zinc-900 text-zinc-300 py-10 text-center">
        <div class="mb-4">
            <h4 class="text-xl font-bold text-yellow-500">BilliardGear.vn</h4>
            <p>Phụ kiện billiards – chất lượng, phong cách, tinh tế.</p>
        </div>
        <div class="flex justify-center space-x-6 mt-4">
            <a href="#" class="hover:text-yellow-400"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="hover:text-yellow-400"><i class="fab fa-instagram"></i></a>
            <a href="#" class="hover:text-yellow-400"><i class="fab fa-youtube"></i></a>
        </div>
        <p class="mt-6 text-sm text-zinc-500">&copy; 2025 BilliardGear. All rights reserved.</p>
    </footer>

</body>

</html>