<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Feedback extends Model
{
    public function saveFeedback($request)
    {
        $feed = new Feedback();

        if ($request->hasFile("image"))
        {
            $image      = $request->file("image");
            $directory  = "images/";
            $name       = "IMG_" . date("Ymd_his") . "." . $image->getClientOriginalExtension();
            $image->move($directory, $name);
            $imageURL   = $directory.$name;

            $feed->name         = $request->name;
            $feed->work         = $request->work;
            $feed->feedback     = $request->feedback;
            $feed->image        = $imageURL;
            
            $feed->save();
            
            return;
        }
    }
}
