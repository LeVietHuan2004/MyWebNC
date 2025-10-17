<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Trang admin: danh sách
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    // Form thêm mới
    public function create()
    {
        return view('admin.products.create');
    }

    // Thêm sản phẩm mới
public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        // 'image' ở đây là tên trường input file trong form của bạn
        'image' => 'nullable|image|max:2048' 
    ]);

    $product = new Product();
    $product->name = $request->name;
    $product->description = $request->description;
    $product->price = $request->price;

    if ($request->hasFile('image')) {
        
        // 1. Lưu file ảnh vào storage/app/public/products
        // $path sẽ có dạng 'products/tenfilebatky.jpg'
        $path = $request->file('image')->store('products', 'public');
        
        // 2. Lưu đường dẫn này vào database (SỬA LẠI CHÚT Ở ĐÂY)
        // Lưu ý: Phương thức store() của Laravel đã tự động tạo tên file duy nhất.
        // Đường dẫn trả về ('products/tenfile.jpg') đã sẵn sàng để dùng với asset('storage/...')
        $product->image = $path; 
    }

    $product->is_active = $request->has('is_active');
    $product->save();

    // Sửa lại tên route đúng với nhóm admin (nếu cần)
    return redirect()->route('admin.products.index')->with('success', 'Đã thêm sản phẩm!');
}

    // Sửa sản phẩm
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    // Cập nhật
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'nullable|image|max:2048'
        ]);

        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $product->image = $path;
        }

        $product->is_active = $request->has('is_active');
        $product->save();

        return redirect()->route('admin.products.index')->with('success', 'Cập nhật thành công!');
    }

    // Xoá sản phẩm
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Đã xoá sản phẩm!');
    }
public function showHome()
    {
        // Chỉ lấy những sản phẩm đang được hiển thị
        $products = Product::where('is_active', true)->get();
        return view('home', compact('products'));
    }
}