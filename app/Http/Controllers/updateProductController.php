<?php

namespace App\Http\Controllers;
use App\Models\Products;
use Illuminate\Http\Request;

class updateProductController extends Controller
{
    public function updateProduct(Request $request, $id){
        $request->validate([
            'productName' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'price' => 'required',
            'quantity' => 'required',
            'description' => 'required',
        ]);
        
        $product = Products::findOrFail($id);
        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('img/products'), $imageName);
            $product->image = $imageName;
        }
        $product->productName = $request->productName;
        $product->update([
            'price' => $request->input('price'),
            'quantity' => $request->input('quantity'),
            'description' => $request->input('description'),
        ]);
        $product->save();
        return redirect('')->with('success', 'Produto atualizado com sucesso!');
    }
}
