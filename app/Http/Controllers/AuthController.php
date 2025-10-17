<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Product;

class AuthController extends Controller
{
    // Hiển thị form đăng ký
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Xử lý đăng ký
    public function register(Request $request)
    {
        // Validate dữ liệu




        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Tạo user mới
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Chuyển hướng sang trang login với thông báo
        return redirect()->route('login')->with('success', 'Tạo tài khoản thành công! Vui lòng đăng nhập.');
    }
    public function showLoginForm()
    {
        return view('auth.login'); // Đảm bảo có file resources/views/auth/login.blade.php
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        // Auth::attempt sẽ dùng bcrypt để so sánh
        if (Auth::attempt($credentials)) {
            // Login thành công
            $request->session()->regenerate(); // bảo mật session

            // Lấy sản phẩm active
            $products = Product::where('is_active', 1)->get();

            return view('welcome', compact('products'));
        }

        // Nếu login thất bại
        return back()->withErrors([
            'email' => 'Email hoặc mật khẩu không đúng',
        ])->withInput();
    }



    // Đăng xuất
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
