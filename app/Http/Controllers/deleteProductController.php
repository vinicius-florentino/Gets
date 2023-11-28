<?php

namespace App\Http\Controllers;
use App\Models\Products;
use Illuminate\Http\Request;

class deleteProductController extends Controller
{
    public function destroyProduct($id)
    {   
        Products::find($id)->delete();
        return redirect('/')->with('success', 'Produto deletado com sucesso!');
    }
}
