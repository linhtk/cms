<?php

namespace cms;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'category_id', 'short_desc', 'description', 'image1', 'image2', 'image3', 'is_hot', 'is_sale', 'price', 'sale_price', 'position', 'active'];

    public function updateOrder($order)
    {
        $this->attributes['position'] = $order ?: null;
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value ?: null;
    }

}
