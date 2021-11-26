<?php

namespace App\Http\Controllers\Product;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class ProductTransactionController extends ApiController
{
    public function __construct()
    {
        parent::__construct(); // Protect all route
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        $this->allowedAdminAction(); // Allow remaining action only admin user can do

        $transactions = $product->transactions;

        return $this->showAll($transactions);
    }
}
