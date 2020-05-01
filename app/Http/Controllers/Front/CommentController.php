<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'     =>   'required',
            'phone'    =>   'required',
            'comment'  =>   'required',
            'rating'   =>   'required'
        ]);
        if($validator->fails())
        {
            
        }
        $comment    =   new Comment();
        $comment->insertComment($request);
        $comments   =   Comment::where('product_id', $request->product_id)->get();
    }

    public function show($id)
    {
        $data['comments']   =   Comment::where('product_id', $id)->orderBy("id", "desc")->take(5)->get();
        $data['length']             =   count(Comment::where('product_id', $id)->orderBy("id", "desc")->get());
        return view('front.comment.show-comment', $data);
    }
}
