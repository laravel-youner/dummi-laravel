<?php

namespace App\Http\Controllers\Buyer;

use App\Buyer;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class BuyerController extends ApiController
{
    public function __construct()
    {
        parent::__construct(); // Protect all route

        $this->middleware('scope:read-general')->only('index'); // OAuth Scope
        $this->middleware('can:view,buyer')->only('show'); // Authorization
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->allowedAdminAction(); // Allow remaining action only admin user can do

        $buyers = Buyer::has('transactions')->get();

        return $this->showAll($buyers);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Buyer $buyer)
    {
        // $buyer = Buyer::has('transactions')->findOrFail($id);
        return $this->showOne($buyer);
    }
}
