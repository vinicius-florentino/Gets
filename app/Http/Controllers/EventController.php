<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{

    public function store(Request $request)
    {

        $request->validate([
            'productName' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);

        $product = new Products;
        $product->productName = $request->productName;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->sellerid = Auth::id();
        
        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('img/products'), $imageName);
            $product->image = $imageName;
        }

        $product->save();


        return redirect('/products')->with('success', 'Produto cadastrado com sucesso!');
    }

}
