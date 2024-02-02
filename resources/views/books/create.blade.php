@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">{{ __('Kitap Ekle') }}</div>
                        <div class="col-6 d-flex justify-content-end">
                            <a href="{{ route('books.index') }}" class="btn btn-primary">Kitaplar</a>
                        </div>
                    </div>
                </div>



                <h1>KİTAP EKLE</h1>
                <form action="{{ route('books.store') }}" method="POST">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @csrf
                    <div class="form-group">
                        <label for="name">Kitabın adı</label>
                        <input type="text" name="name" class="form-control" placeholder="Kitabın adı" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Kitabın fiyatı</label>
                        <input type="text" name="price" class="form-control" placeholder="Kitabın fiyatı" required>
                    </div>
                    <button type="submit" class="btn btn-success">EKLE</button>
                </form>

            </div>
        </div>
    </div>
</div>
</div>
@endsection

<div class="row bg-dark" style="height: 100;">
    <div class="col-2 bg-danger">YAKALA CHAT</div>
    <div class="col-8 bg-white d-flex justify-content-center">Sezin Tıp</div>
    <div class="col-2 bg-danger">YAKALA CHAT</div>
</div>