<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    //

    protected $guarded = [];

    public function users()
    {
        
        return $this->belongsTo('App\User');
    }
}
