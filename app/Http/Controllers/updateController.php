<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class updateController extends Controller
{
    public function update(Request $request, $id)
    {   
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $name = $request->input('name');
        $email = $request->input('email');

        User::updateOrCreate(
            ['id' => $id],
            ['name' => $name, 'email' => $email] 
        );
        return redirect('/userProfile')->with('success', 'Perfil atualizado com sucesso!');
    }
}
