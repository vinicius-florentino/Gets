<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\Products;
use App\Models\Vendas;
use Illuminate\Support\Carbon;
use App\Models\User;

class showController extends Controller
{
    public function show($id){
        $vendas = Vendas::where('product_id', $id)->get();
        $product = Products::findOrFail($id);
        $seller = User::find($product->sellerid);

        $comments = Comments::where('product_id', $id)
        ->orderBy('date', 'desc')
        ->get();
        //ordernar do mais recente para o mais tardio
        foreach ($comments as $comment) {
            $comment->date = Carbon::parse($comment->date);
        }

        return view('events.show', ['products' => $product, 'users' => $seller, 'vendas' => $vendas, 'comments' => $comments]);
    }
}
