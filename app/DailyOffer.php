<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DailyOffer extends Model
{
    protected $fillable =   [
        'promotion_title',
        'publication_status'
    ];
}
