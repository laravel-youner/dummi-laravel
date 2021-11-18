<?php

namespace App;

use App\Scopes\SellerScope;
use Illuminate\Database\Eloquent\Model;
use App\Transformers\SellerTransformer;

class Seller extends User
{
    public $transformer = SellerTransformer::class; // linking model and transformer

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new SellerScope);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
