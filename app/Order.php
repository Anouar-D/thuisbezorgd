<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function consumableOrders(){
        return $this->hasMany('App\ConsumableOrder');
    }


    public function consumables()
    {
        return $this->belongsToMany('App\Consumable')->withPivot('order_id', 'consumable_id', 'restaurant_id', 'quantity');
    }
}
