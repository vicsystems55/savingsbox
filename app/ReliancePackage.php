<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReliancePackage extends Model
{
    //

    public function payments()
    {
        return $this->hasMany('App\PaymentSchedule', 'package_id');
    }
}
