<?php

namespace App\Http\Controllers\Transaction;

use App\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class TransactionSellerController extends ApiController
{
    public function __construct()
    {
        parent::__construct(); // Protect all route

        $this->middleware('scope:read-general')->only('index'); // OAuth Scope
        $this->middleware('can:view,transaction')->only('index'); // Authorization
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Transaction $transaction)
    {
        $seller = $transaction->product->seller;

        return $this->showOne($seller);
    }
}
