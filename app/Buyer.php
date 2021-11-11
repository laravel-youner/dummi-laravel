<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Transformers\BuyerTransformer;

class Buyer extends User
{
    public $transformer = BuyerTransformer::class;

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
