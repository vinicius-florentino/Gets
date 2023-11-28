@extends('layouts.main')

@section('title', 'UniPlace')

@section('content')
@if (session('success'))
<div class="container">
    <div class="pt-3">
        <div class="alert alert-success d-flex justify-content-center">
            {{ session('success') }}
        </div>
    </div>
</div>
@endif
<div class="container">
    <div class="row justify-content-center py-3">
            <div class="col-12">
                <form action="/products/{{ Auth::id() }}" method="POST" class="w-100" enctype="multipart/form-data">  
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