<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Comments;
class commentController extends Controller
{
    public function commentProduct($product_id, $buyer_id, Request $request)
    {   
        $comment = new Comments;

        $comment->product_id = $product_id;
        $comment->buyer_id = $buyer_id;
        $comment->comments = $request->input('comments');
        $date = Carbon::now()::orderBy('data','desc')->get();
        $comment->date = $date;
        $comment->save();

        return redirect()->back()->with('success', 'Comentário executada com sucesso!');
    }
}
