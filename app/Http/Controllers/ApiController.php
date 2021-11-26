<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    use ApiResponser;

    public function __construct()
    {
        $this->middleware('auth:api'); // Protect all routes
    }

    protected function allowedAdminAction() // Allow remaining action only admin user can do
    {
        if (Gate::denies('admin-action')) {
            throw new AuthorizationException('This action is unauthorized');
        }
    }
}
