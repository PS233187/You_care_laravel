<?php

namespace App\Http\Controllers;

use App\Models\Rooster;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;


class RoosterController extends Controller
{
    function __construct()
    {
        $this->middleware('role_or_permission:Rooster bekijken|Rooster aanmaken|Rooster bewerken|Rooster verwijderen', ['only' => ['index', 'show']]);
        $this->middleware('role_or_permission:Rooster aanmaken', ['only' => ['create', 'store']]);
        $this->middleware('role_or_permission:Rooster bewerken', ['only' => ['edit', 'update']]);
        $this->middleware('role_or_permission:Rooster verwijderen', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = [];

        $roosters = Rooster::with('user')->get();

        foreach ($roosters as $rooster) {
            $events[] = [
                'id' => $rooster->id,
                'title' => $rooster->user->name,
                'start' => date('Y-m-d\TH:i:s', strtotime($rooster->date . ' ' . $rooster->start_time)),
                'end' => date('Y-m-d\TH:i:s', strtotime($rooster->date . ' ' . $rooster->end_time)),
            ];
        }

        return view('rooster.index', ['events' => $events]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $users = User::has(('roles'))->get();
        $users = User::whereHas('roles', function ($query) {
            $query->whereIn('name', ['Verpleegkundige', 'mantelzorger']);
        })->get();
        return view('rooster.create', ['users' => $users]) ;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date_format:Y-m-d',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'user' => 'required|exists:users,id',
        ]);

        // Check for existing rooster with the same user, date, and time
        $existingRooster = Rooster::where('user_id', $request->user)
            ->where('date', $request->date)
            ->where(function ($query) use ($request) {
                $query->where(function ($query) use ($request) {
                    $query->where('start_time', '<', $request->start_time)
                        ->where('end_time', '>', $request->start_time);
                })->orWhere(function ($query) use ($request) {
                    $query->where('start_time', '<', $request->end_time)
                        ->where('end_time', '>', $request->end_time);
                })->orWhere(function ($query) use ($request) {
                    $query->where('start_time', '>=', $request->start_time)
                        ->where('end_time', '<=', $request->end_time);
                });
            })
            ->first();

        if ($existingRooster) {
            return redirect()->back()->with('error', 'Er bestaat al een dienst voor de geselecteerde gebruiker voor de opgegeven datum en tijd.');
        }

        // If no existing rooster, create a new one
        $rooster = new rooster;
        $rooster->date = $request->date;
        $rooster->start_time = $request->start_time;
        $rooster->end_time = $request->end_time;
        $rooster->user_id = $request->user;
        $rooster->save();

        return redirect()->route('rooster.index')->with('success', 'Dienst is succesvol aangemaakt.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rooster $rooster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rooster $rooster)
    {
        $users = User::whereHas('roles', function ($query) {
            $query->whereIn('name', ['Verpleegkundige', 'mantelzorger']);
        })->get();
        return view('rooster.edit', ['rooster' => $rooster, 'users' => $users]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rooster $rooster)
    {
        // dd($request->all());
        $request->validate([
            'date' => 'required|date_format:Y-m-d',
            'start_time' => 'required|date_format:H:i:s',
            'end_time' => 'required|date_format:H:i:s|after:start_time',
            'user' => 'required|exists:users,id',
        ]);
        // Check for existing rooster with the same user, date, and time
        $existingRooster = rooster::where('user_id', $request->user)
            ->where('date', $request->date)
            ->where('id', '!=', $rooster->id)
            ->where(function ($query) use ($request) {
                $query->where(function ($query) use ($request) {
                    $query->where('start_time', '<', $request->start_time)
                        ->where('end_time', '>', $request->start_time);
                })->orWhere(function ($query) use ($request) {
                    $query->where('start_time', '<', $request->end_time)
                        ->where('end_time', '>', $request->end_time);
                })->orWhere(function ($query) use ($request) {
                    $query->where('start_time', '>=', $request->start_time)
                        ->where('end_time', '<=', $request->end_time);
                });
            })
            ->first();

        if ($existingRooster) {
            return redirect()->back()->with('error', 'Er bestaat al een dienst voor de geselecteerde gebruiker voor de opgegeven datum en tijd.');
        }

        // If no existing rooster, update the rooster
        $rooster->date = $request->date;
        $rooster->start_time = $request->start_time;
        $rooster->end_time = $request->end_time;
        $rooster->user_id = $request->user;
        $rooster->save();

        return redirect()->route('rooster.index')->with('success', 'Dienst is succesvol bijgewerkt.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rooster $rooster)
    {
        $rooster->delete();
        return redirect()->route('rooster.index')->with('success', 'Dienst is succesvol verwijderd.');
    }
}
