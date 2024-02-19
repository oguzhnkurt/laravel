<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Tüm ürünleri listele
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // Yeni ürün oluşturma formunu göster
    public function create()
    {
        return view('products.create');
    }

    // Yeni ürünü kaydet
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            // Diğer gerekli alanlar
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')->with('success', 'Ürün başarıyla eklendi.');
    }

    // Belirli bir ürünü göster
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    // Bir ürünü düzenleme formunu göster
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    // Bir ürünü güncelle
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            // Diğer gerekli alanlar
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Ürün başarıyla güncellendi.');
    }

    // Bir ürünü sil
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Ürün başarıyla silindi.');
    }
}
