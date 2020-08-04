<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OccationalOffer extends Model
{
    protected $fillable =   [
        'occational_offer_title',
        'publication_status'
    ];
}
