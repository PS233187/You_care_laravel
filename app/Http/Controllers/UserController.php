<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('role_or_permission:Gebruiker bekijken|Gebruiker aanmaken|Gebruiker bewerken|Gebruiker verwijderen', ['only' => ['index', 'show']]);
        $this->middleware('role_or_permission:Gebruiker aanmaken', ['only' => ['create', 'store']]);
        $this->middleware('role_or_permission:Gebruiker bewerken', ['only' => ['edit', 'update']]);
        $this->middleware('role_or_permission:Gebruiker verwijderen', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::has('roles')->get();

        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('users.create', ['roles' => $roles]);
        return redirect()->route('users.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'nullable|string|max:255',
            'phone_number' => 'nullable|digits:10',
            'address' => 'nullable|string|max:100',
            'postal_code' => 'nullable|string|max:6',
            'city' => 'nullable|string|max:28',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        // Maak de gebruiker aan
        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surename,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'postal_code' => $request->postal_code,
            'city' => $request->city,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        // dd($user);
        $roleNames = Role::whereIn('id', $request->roles)->pluck('name');
        $user->syncRoles($roleNames);
        return redirect()->route('users.index')->with('success', 'Gebruiker is succesvol aangemaakt.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('users.edit', ['user' => $user, 'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'surename' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:100',
            'postal_code' => 'nullable|string|max:6',
            'city' => 'nullable|string|max:28',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8', // Laat het wachtwoord veld leeg als het niet wordt bijgewerkt
        ]);

        $user->update([
            'name' => $request->name,
            'surename' => $request->surename,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'postal_code' => $request->postal_code,
            'city' => $request->city,
            'email' => $request->email,
        ]);

        // Wijs de geselecteerde rol toe aan de gebruiker
        $user->roles()->detach();
        $roleNames = Role::whereIn('id', $request->roles)->pluck('name');
        $user->syncRoles($roleNames);

        return redirect()->route('users.index')->with('success', 'Gebruiker is succesvol bijgewerkt.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Gebruiker is succesvol verwijderd.');
    }
}
