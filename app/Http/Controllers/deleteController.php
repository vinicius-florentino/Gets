<?php

namespace App\Http\Controllers;
use App\Models\User;

class deleteController extends Controller
{
    public function destroy($id)
    {   
        User::find($id)->delete();
        return redirect('/')->with('success', 'Perfil deletado com sucesso!');
    }
}
