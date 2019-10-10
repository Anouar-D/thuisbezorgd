<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = [
        'title', 'email', 'address', 'zipcode', 'city', 'phone',
    ];
    
    protected $hidden = [
        'user_id',
    ];

    public function consumable(){
        return $this->HasMany('App\Consumable');
    }
}
