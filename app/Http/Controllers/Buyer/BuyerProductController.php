<?php

namespace App\Http\Controllers\Buyer;

use App\Buyer;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class BuyerProductController extends ApiController
{
    public function __construct()
    {
        parent::__construct(); // Protect all route

        $this->middleware('scope:read-general')->only('index'); // OAuth Scope
        $this->middleware('can:view,buyer')->only('index'); // Authorization
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Buyer $buyer)
    {
        $products = $buyer->transactions()->with('product')
            ->get()
            ->pluck('product');

        return $this->showAll($products);
    }
}
