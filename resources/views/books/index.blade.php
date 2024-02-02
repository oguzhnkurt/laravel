@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                <div class="row">
                    <div class="col-6">{{ __('Kitaplar') }}</div>
                    <div class="col-6 d-flex justify-content-end"><a href="{{route('books.create')}}" class="btn btn-success">Kitap Ekle</a></form></div>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kitabı Ekleyen</th>
                            <th scope="col">Kitabın ismi</th>
                            <th scope="col">Fiyatı</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $book)
                        <tr>
                            <th scope="row">{{$book->id}}</th>
                            <td>{{$book->user->name}}</td>
                            <td>{{$book->name}}</td>
                            <td>{{$book->price}}</td>
                            <td><a href="{{ route('books.edit', $book->id)}}" class=" btn btn-info">Düzenle</a></td>
                            <td><a href="{{ route('books.delete', $book->id)}}" class=" btn btn-danger">sil</a></td>
                            
                        </tr>
                            @endforeach
                        </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
</div>
@endsection