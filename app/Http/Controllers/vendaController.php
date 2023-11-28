<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendas;
use App\Models\Products;

class vendaController extends Controller
{
    public function vendaProduct($id, $userId, Request $request)
    {
        $product = Products::findOrFail($id);

        if ($product->quantity >= $request->input('quantity')) {
            $vendas = new Vendas;

            $vendas->product_id = $id;
            $vendas->buyer_id = $userId;
            $vendas->quantity = $request->input('quantity');
            $vendas->save();

            $product->quantity -= $request->input('quantity');
            $product->save();

            return redirect()->back()->with('success', 'Compra executada com sucesso!');
        } else {
            return redirect()->back()->with('error', 'Quantidade insuficiente do produto para a compra.');
        }
    }
}
