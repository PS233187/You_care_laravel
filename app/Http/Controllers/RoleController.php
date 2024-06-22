<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Permission;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    function __construct() // construct gebruikt om middelware te definieren 
    {
        $this->middleware('role_or_permission:Rol bekijken|Rol aanmaken|Rol bewerken|Rol verwijderen', ['only' => ['index', 'show']]);
        $this->middleware('role_or_permission:Rol aanmaken', ['only' => ['create', 'store']]);
        $this->middleware('role_or_permission:Rol bewerken', ['only' => ['edit', 'update']]);
        $this->middleware('role_or_permission:Rol verwijderen', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('roles.index', ['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('roles.create', compact('roles', 'permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Valideer het request
        $request->validate([
            'name' => 'required|string|max:255|unique:roles',
            'permissions' => 'array',
        ]);

        // Maak een nieuwe rol aan
        $role = Role::create([
            'name' => $request->name,
        ]);

        // Wijs permissies toe aan de rol, indien opgegeven
        if ($request->has('permissions')) {
            foreach ($request->permissions as $permissionId) {
                $permission = Permission::find($permissionId);
                if ($permission) {
                    $role->givePermissionTo($permission);
                }
            }
        }




        return redirect()->route('roles.index')->with('success', 'Rol is succesvol aangemaakt.');
    }


    /**
     * Display the specified resource.
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();

        // Haal alle permissie ID's op die aan de rol zijn toegewezen
        $rolePermissions = $role->permissions->pluck('id')->toArray();

        return view('roles.edit', ['role' => $role, 'permissions' => $permissions, 'rolePermissions' => $rolePermissions]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Vind de rol op basis van ID
        $role = Role::findOrFail($id);

        // Valideer het request
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . $role->id,
            'permissions' => 'array',
        ]);

        // Werk de rolgegevens bij
        $role->update([
            'name' => $request->name,
        ]);

        // Filter geldige permissie ID's
        $validPermissionIds = Permission::whereIn('id', $request->permissions)->pluck('id')->toArray();

        // Synchroniseer de permissies met de rol
        $role->syncPermissions($validPermissionIds);

        // Redirect naar de rol index pagina met succesmelding
        return redirect()->route('roles.index')->with('success', 'Rol is succesvol bijgewerkt.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->route('roles.index')->with('success', 'Rol is succesvol verwijderd.');
    }
}
