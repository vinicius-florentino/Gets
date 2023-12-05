@extends('layouts.main')

@section('title', 'UniPlace')

@section('content')
<div class="px-5 pb-3 container">
    <div class="py-3">
@if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
@endif
        <h1>
            Busque um produto:
        </h1>
        <form action="/" method="GET">
            <input type="text" id="search" name="search" class="form-control" placeholder="Procure um produto:">
        </form>
    </div>
@if($search)
    <div>
        <h1>
            Buscando por: {{$search}}
        </h1>
    </div>
@endif
@auth
    <div class="pb-3">
        <a href="/products">Cadastre um produto</a>
    </div>
@endauth
@guest
    <div class="pb-3">
        <a href="/register" onclick="alert('Você precisa ter uma conta para cadastrar um produto')">Cadastre um produto</a>
    </div>
@endguest

@if(count($products)>=1)
    <h2 class="pb-2">
        Últimos produtos lançados:
    </h2>
    <div class="row d-flex justify-content-center">
    @foreach($products as $product)
        @if($product->quantity>=1)
            <div class="card col-md-4 col-xl-3 col-12 mx-4">
                <img src="/img/products/{{$product->image}}" style="border: 1px solid black; margin:10px;" alt="{{$product->productName}}">
                <div class="card-body">
                    <h5 class="productName">
                        Nome: {{$product->productName}}
                    </h5>
                    <p class="productQuantity">
                        Quantidade: {{$product->quantity}}
                    </p>
                    <p class="productPrice">
                        Preço: R${{$product->price}}
                    </p>
                    <a href="/events/{{ $product->id }}" class="btn btn-primary w-100">Comprar</a>
                </div>
            </div>
        @endif
    @endforeach
    </div>
@else
    <h1 class="noProducts display-6">
        Não há nenhum produto:
    </h1>
    <div class="mb-2">
        <a href="/">Ver todos os produtos</a>
    </div>
@endif
</div>
@endsection

@section('footer')

@endsection