@extends('layouts.main')
@section('title', 'Profile')


@section('content')
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-12 py-4">
                <img src="/img/products/{{$products->image}}" class="img-fluid w-75" style="border: 1px solid black;" alt="{{$products->title}}">
            </div>
            <div class="col-lg-6 col-12 pt-4">
                <form action="/updateProducts/{{$products->id}}" method="POST" class="w-100" enctype="multipart/form-data">
                @csrf      
                    <div class="mb-3">
                        <label for="productName" class="form-label">Nome do produto</label>
                        <input type="text" name="productName" class="form-control" id="productName" aria-describedby="emailHelp" required>
                    </div>
                    <div class="form-group">
                        <label for="image">Imagem do produto:</label>
                        <input type="file" class="file" id="image" required name="image">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Preço</label>
                        <input type="number" name="price" class="form-control" id="price" step="0.01" inputmode="numeric" min="0" required>
                    </div>
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantidade</label>
                        <input type="number" name="quantity" class="form-control" id="quantity" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Comentários</label>
                        <textarea class="form-control" name="description" placeholder="Detalhes do produto:" id="description" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer')
@endsection