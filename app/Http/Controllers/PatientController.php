<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use Spatie\Permission\Models\Role;

class PatientController extends Controller
{
    function __construct()
    {
        $this->middleware('role_or_permission:Patiënt bekijken|Patiënt aanmaken|Patiënt bewerken|Patiënt verwijderen', ['only' => ['index', 'show']]);
        $this->middleware('role_or_permission:Patiënt aanmaken', ['only' => ['create', 'store']]);
        $this->middleware('role_or_permission:Patiënt bewerken', ['only' => ['edit', 'update']]);
        $this->middleware('role_or_permission:Patiënt verwijderen', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Patient::has('roles')->get();

        return view('patients.index', ['patients' => $patients]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('patients.create', ['roles' => $roles]);
        return redirect()->route('patients.index');
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
            'email' => 'required|string|email|max:255|unique:patients',
            'password' => 'required|string|min:8',
        ]);

        // Maak de patient aan
        $patient = Patient::create([
            'name' => $request->name,
            'surname' => $request->surename,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'postal_code' => $request->postal_code,
            'city' => $request->city,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        $patientNames = Role::whereIn('id', $request->patient)->pluck('name');
        $patient->syncRoles($patientNames);
        return redirect()->route('users.index')->with('success', 'Gebruiker is succesvol aangemaakt.');

}

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        return view('patients.show', ['patient' => $patient]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        $roles = Role::all();
        return view('patients.edit', ['patient' => $patient, 'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'nullable|string|max:255',
            'phone_number' => 'nullable|digits:10',
            'address' => 'nullable|string|max:100',
            'postal_code' => 'nullable|string|max:6',
            'city' => 'nullable|string|max:28',
            'email' => 'required|string|email|max:255|unique:patients,email,' . $patient->id,
            'password' => 'required|string|min:8',
        ]);

        $patient->update([
            'name' => $request->name,
            'surname' => $request->surename,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'postal_code' => $request->postal_code,
            'city' => $request->city,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        $patientNames = Role::whereIn('id', $request->patient)->pluck('name');
        $patient->syncRoles($patientNames);
        return redirect()->route('patients.index')->with('success', 'Patiënt is succesvol aangepast.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect()->route('patients.index')->with('success', 'Patiënt is succesvol verwijderd.');
    }
}
