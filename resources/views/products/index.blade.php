<!-- resources/views/products/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Ürün Listesi</h2>

        <a href="{{ route('products.create') }}" class="btn btn-primary">Şuanlık Tıklama !</a>

        @if ($products->count() > 0)
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Adı</th>
                        <th>Açıklama</th>
                        <th>Fiyat</th>
                        <th>İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->price }}</td>
                            <td>
                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-info">Detaylar</a>
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Düzenle</a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Emin misiniz?')">Sil</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Henüz hiç ürün eklenmemiş.</p>
        @endif
    </div>
@endsection
