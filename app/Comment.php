<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable =   [
        'reply'
    ];
    public function insertComment($request)
    {
        $comment    =   new Comment();

        $comment->name         =   $request->name;
        $comment->phone        =   $request->phone;
        $comment->comment      =   $request->comment;
        $comment->product_id   =   $request->product_id;
        $comment->rating       =   $request->star;
        $comment->save();
        return;
    }

}
