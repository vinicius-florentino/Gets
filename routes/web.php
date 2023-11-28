<?php

use App\Http\Controllers\commentController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\showController;
use App\Http\Controllers\deleteController;
use App\Http\Controllers\deleteProductController;
use App\Http\Controllers\iconController;
use App\Http\Controllers\updateController;
use App\Http\Controllers\updateProductController;
use App\Http\Controllers\vendaController;
use Illuminate\Support\Facades\Route;
use App\Models\Products;
use App\Models\User;
use App\Models\Vendas;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//FUNÇÕES QUE RETORNAM UMA VIEW
Route::get('/', function(){
    //FUNÇÃO SEARCH PARA PROCURAR PRODUTOS
    $search = request('search');
    if($search){
        $products = Products::where([
            ['productName','like','%'.$search.'%']
        ])->get();;
    }else{
        $products = Products::all();
    }
    return view('welcome',compact('products'),['search'=>$search]);
});
 
Route::get('/products', function(){
    return view('events/products');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () 
{
    //FUNÇÃO UPDATE E DELETE USER
    Route::delete('/delete/{id}', [deleteController::class, 'destroy']);
    Route::post('/update/{id}', [updateController::class,'update']);
    Route::post('/iconUpdate/{id}', [iconController::class, 'iconUpdate']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //FIM FUNÇÃO UPDATE E DELETE USER

    //FUNÇÕES CRUD PRODUTOS
    Route::post('/products/{id}', [EventController::class, 'store']);
    Route::get('/events/{id}', [showController::class, 'show']);
    Route::post('/updateProducts/{id}', [updateProductController::class,'updateProduct']);
    Route::delete('/deleteProduct/{id}', [deleteProductController::class, 'destroyProduct']);
    //FIM FUNÇÕES CRUD PRODUTOS

    //FUNÇÃO CADASTRAR VENDA NO BANCO
    Route::post('/show/{id}/{userId}', [vendaController::class, 'vendaProduct']);
    //FIM FUNÇÃO CADASTRAR VENDA BANCO

    //FUNÇÃO CADASTRAR COMENTÁRIO NO BANCO
    Route::post('/comments/{product_id}/{buyer_id}', [commentController::class, 'commentProduct']);
    //FIM FUNÇÃO CADASTRAR COMENTÁRIO BANCO

    Route::get('/myproductsEdit/{id}',function($id){
        //RETORNA A VIEW myproductsEdit que espera um parametro de id, faz um findOrFail que verifica se tem no banco 
        //se tem ela retorna a view de events.myproductsEdit com um array de dados de produts daquel id
        $products = Products::findOrFail($id);
        return view('events.myproductsEdit', ['products' => $products]);
    });
    
    Route::get('/shoppingList',function() {
        //RETORNAR A VIEW shoppingList com todos os dados de compras, aonde na view ele faz uma filtragem para mostrar apenas as compras do usuario
        $vendas = Vendas::all();
        $products = Products::all();
        return view('events/shoppingList',compact('products', 'vendas'));
    });

    Route::get('/userProfile', function(){
        $user = User::where('id', Auth::id())->get();
        return view('events/userProfile',compact('user'));
    });
    
    Route::get('/myproducts',function() {
        //RETORNAR A VIEW myproducts com todos os dados de products, aonde na view ele faz uma filtragem para mostrar apenas os dados do usuario
        $products = Products::all();
        return view('events/myproducts',compact('products'));
    });

});

require __DIR__.'/auth.php';    
