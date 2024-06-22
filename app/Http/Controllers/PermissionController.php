<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    function __construct()
    {
        $this->middleware('role_or_permission:Recht bekijken|Recht aanmaken|Recht bewerken|Recht verwijderen', ['only' => ['index', 'show']]);
        $this->middleware('role_or_permission:Recht aanmaken', ['only' => ['create', 'store']]);
        $this->middleware('role_or_permission:Recht bewerken', ['only' => ['edit', 'update']]);
        $this->middleware('role_or_permission:Recht verwijderen', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::all();
        return view('permissions.index', ['permissions' => $permissions]);
    }
}
