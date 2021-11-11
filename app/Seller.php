<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Transformers\SellerTransformer;

class Seller extends User
{
    public $transformer = SellerTransformer::class;

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
