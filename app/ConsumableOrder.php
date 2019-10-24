<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ConsumableOrder extends Pivot
{
    // protected $table = 'consumable_order';

    public function order(){
        return $this->belongsTo('App\Order');
    }

    public function consumables(){
        return $this->belongsTo('App\Consumable');
    }
}
