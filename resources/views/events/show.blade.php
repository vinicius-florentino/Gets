@extends('layouts.main')
@section('title', 'Profile')


@section('content')
@if(session('success'))
<div class="px-4 pb-3 container">
    <div class="pt-3">
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    </div>
</div>
@endif
@if(session('error'))
<div class="px-4 pb-3 container">
    <div class="pt-3">
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    </div>
</div>
@endif
<div class="pb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-12 py-4">
                <img src="/img/products/{{$products->image}}" class="img-fluid w-75" style="border: 1px solid black;" alt="{{$products->title}}">
            </div>
            <div class="col-lg-6 col-12 py-2">
                <div>
                    <h3 class="horizontal-line">
                        {{$products->productName}}
                    </h3>
                    <p class="horizontal-line">
                        Quantidade: {{$products->quantity}}
                    </p>
                    <p class="horizontal-line">
                        Preço: {{$products->price}}R$
                    </p>
                    <p class="horizontal-line">
                        Vendedor: {{ $users->name }}
                    </p>
                    <p style="text-align: justify;" class="horizontal-line">
                        Detalhes: {{$products->description}}
                    </p>
                </div>
                <div class="row px-3 mb-5">
                    @guest
                    <div class="col-12">
                        <a href="/login" class="text-white" onclick="alert('Você precisa ter uma conta para fazer a compra')"><button type="submit" class="btn btn-success mt-4 w-100">Comprar</button></a>
                    </div>
                    @endguest
                    @auth
                    @if($products->sellerid != Auth::id())
                    <form action="/show/{{$products->id}}/{{ Auth::id() }}" method="POST" class="w-100" enctype="multipart/form-data">
                        @csrf
                        <label for="quantity" class="form-label">Quantidade</label>
                        <input type="number" name="quantity" class="form-control" id="quantity" min="1" placeholder="1" required>
                        <div class="col-12 mb-5">
                            <button type="submit" class="btn btn-success mt-4 w-100">Comprar</button>
                        </div>
                    </form>
                    @else
                    <div class="col-6">
                        <a href="/myproductsEdit/{{$products->id}}" class="text-white"><button type="submit" class="btn btn-primary mt-4 w-100">Editar</button></a>
                    </div>
                    <div class="col-6">
                        <form action="/deleteProduct/{{$products->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger mt-4 w-100">Excluir</button>
                        </form>
                    </div>
                    @endif
                    @endauth
                </div>
            </div>
        </div>
        @foreach ($vendas as $venda)
            @if(Auth::id() == $venda->buyer_id)
                <div>
                    <form action="/comments/{{$products->id}}/{{ Auth::id() }}" method="POST">
                        @csrf
                        <div>
                            <label for="comments" class="form-label">Comentários</label>
                            <textarea class="form-control" name="comments" placeholder="Detalhes do produto:" id="comments" required></textarea>
                        </div>
                        <div class="mt-1 mb-3">
                            <button type="submit" class="btn btn-success mt-4 w-100">Comentar</button>
                        </div>
                    </form>
                </div>   
            @break
            @endif     
        @endforeach
        @foreach ($comments as $comment)
            <div class="my-4">
                <div class="rounded py-2" style="border: 1px solid grey;">
                    <div class="p-2">
                        <div class="row">
                            <div class="col-4">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <ion-icon name="person-outline"></ion-icon>
                                    </div>
                                    <div class="mx-3">
                                        {{$comment->buyer->name}}
                                    </div>
                                    <div>
                                        {{ $comment->date->format('d/m/Y') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pl-3">
                        {{$comment->comments}}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
@section('footer')
@endsection