<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class iconController extends Controller
{
    public function iconUpdate(Request $request, $id)
    {    
        
        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('img/icon'), $imageName);
            User::where('id', $id)->update(['image' => $imageName]);
        }

        return redirect()->back();
    }
}
