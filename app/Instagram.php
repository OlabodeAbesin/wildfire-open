<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instagram extends Model
{
    // protected $table = 'instagram';
 
    protected $fillable = [
        'influencer_id', 'instagram_id', 'access_token',
    ];
}
