<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{

    use SoftDeletes;
    protected $fillable = ['product_name', 'category_id', 'product_summary', 'product_description', 'product_price', 'publication_status', 'product_image', 'deleted_at'];
    public function relationToCategory()
    {
        return $this->hasOne('App\Category', 'id', 'category_id');
    }
}
