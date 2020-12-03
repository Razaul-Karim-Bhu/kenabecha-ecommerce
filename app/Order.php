<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function get_customer_name()
    {
        return $this->hasOne('App\Customer', 'id', 'customer_id');
    }
}
