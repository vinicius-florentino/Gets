@extends('layouts.main')

@section('title', 'UniPlace')
@section('content')
<div class="container pt-2 pb-5 px-2">
    @if($vendas->count() > 0)
        <div class="table-responsive">
            <table class="table table-bordered text-center text-capitalize">
                <thead>
                    <tr>
                        <th>Imagem</th>
                        <th>Nome do Produto</th>
                        <th>Quantidade</th>
                        <th>Preço</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($vendas as $venda)
                    @if($venda->buyer_id == Auth::id())
                        @php
                                $product = $products->where('id', $venda->product_id)->first();
                        @endphp
                        @if($product)
                            @php
                                $totalPrice = $product->price * $venda->quantity;
                            @endphp
                            <tr>
                                <td class="w-100 d-flex justify-content-center align-items-center">
                                    <img src="/img/products/{{$product->image}}" style="width: 120px;" alt="{{$product->productName}}">
                                </td>
                                <td>
                                    <h4>
                                        <a href="/events/{{$venda->product_id}}" style="color: black;">
                                            {{$product->productName}}
                                        </a>
                                    </h4>
                                </td>
                                <td>
                                    {{$venda->quantity}}
                                </td>
                                <td>
                                    {{$totalPrice}}R$
                                </td>
                            </tr>
                        @endif
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="p-3">
            <div class="d-flex justify-content-center align-items-center">
                <h2>
                    Você não fez nenhuma compra ainda
                </h2>
            </div>
            <div class="d-flex justify-content-center align-items-center">
                <a href="/">Ver todos os produtos</a>
            </div>
        </div>
    @endif
</div>
@endsection

@section('footer')

@endsection
