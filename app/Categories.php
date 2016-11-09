<?php

namespace cms;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable = ['name', 'parent_id', 'has_child', 'position', 'active'];

    public function updateOrder($order)
    {
        $this->attributes['position'] = $order ?: null;
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value ?: null;
    }

}
