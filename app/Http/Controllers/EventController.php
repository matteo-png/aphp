<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Statut;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $events = Event::with('statut')->get();
       
        $events = $events->map(function ($event) {
            return [
                'id' => $event->id,
                'title' => $event->title,
                'start' => $event->start,
                'end' => $event->end,
                'statut' => $event->statut->libelle,
            ];
        });

        return response()->json($events)->header('Content-Type', 'application/json');
           
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //$statut = Statut::all('id','libelle')->pluck('libelle','id');
     
        return view('event/modale/add');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Event::create($request->all());
        return redirect()->route('planning.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        $event->delete();
        return redirect()->route('planning.index')->with('success', 'Événement supprimé avec succès');
    }
}
