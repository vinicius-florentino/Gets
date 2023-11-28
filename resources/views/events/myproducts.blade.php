@extends('layouts.main')

@section('title', 'UniPlace')

@section('content')
<div class="container my-3">
    @if(count($products)>=1)
        <div class="table-responsive">
            <table class="table table-bordered text-center text-capitalize">
                <thead>
                    <tr>
                        <th>Imagem</th>
                        <th>Nome do Produto</th>
                        <th>Quantidade</th>
                        <th>Preço</th>
                        <th>Editar produto</th>
                        <th>Excluir produto</th>
                    </tr>
                </thead>
                    @foreach ($products as $product)
                        @if($product->sellerid == Auth::id())
                            <tbody>
                                <tr>
                                    <td class="w-100 d-flex justify-content-center align-items-center">
                                        <img src="/img/products/{{$product->image}}" class="d-flex justify-content-center" style="width: 120px;" alt="{{$product->productName}}">
                                    </td>
                                    <td>
                                        <h4>
                                            {{$product->productName}}
                                        </h4>
                                    </td>
                                    <td>{{$product->quantity}}</td>
                                    <td>{{$product->price}}R$</td>
                                    <td>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <a href="/myproductsEdit/{{$product->id}}">
                                                <button class="btn btn-primary">
                                                    Editar
                                                </button>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <form action="/deleteProduct/{{$product->id}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger w-100">Excluir</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        @endif
                    @endforeach
            </table>
        </div>
    @else
        <div class="container">
            <div class="d-flex justify-content-center">
                <h1>
                    Você ainda não cadastrou nenhum produto
                </h1>
            </div>
            <div class="d-flex justify-content-center">
                <a href="/products">Cadastre aqui</a>
            </div>
        </div>
    @endif
</div>
@endsection

@section('footer')

@endsection