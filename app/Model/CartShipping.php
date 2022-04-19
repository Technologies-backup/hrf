<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CartShipping extends Model
{
    //
    public function shipping_method(){
        return $this->belongsTo(ShippingMethod::class);
    }
}
