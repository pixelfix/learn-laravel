<?php

namespace App\Http\Controllers;

use App\Http\Resources\RoleCollection;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        return new RoleCollection(Role::all());
    }
}
