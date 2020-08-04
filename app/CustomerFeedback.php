<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerFeedback extends Model
{
    public function saveFeedback($request)
    {
        $feedback = new CustomerFeedback();
        
        $feedback->name           = $request->name;
        $feedback->work           = $request->work;
        $feedback->feedback       = $request->feedback;
        $feedback->save();
        return;
    }
}
