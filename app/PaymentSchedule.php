<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentSchedule extends Model
{
    //

    protected $guarded = [];

    public function packages()
    {
        return $this->belongsTo('App\ReliancePackage', 'package_id');
    }

    public function users()
    {
        
        return $this->belongsTo('App\User', 'user_id');
    }
}
