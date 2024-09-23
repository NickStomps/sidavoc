<?php

namespace App\Http\Controllers;

use App\Models\activiteit;
use App\Models\activiteitBeheer;
use Exception;
use Illuminate\Http\Request;

class ActiviteitBeheerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('activiteitBeheer');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    try{
        $this->validate($request, [
            'image' => 'required|image|mimes:png,jpg,jpeg,gif,webp|max:2048',
        ]);

        // Save the image in the 'public/images' directory
        $imageName = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->storeAs('public/images', $imageName);
       
        // Create a new activity instance
        $activiteit = new activiteit();
        
        // Assign the data to the activity model
        $activiteit->naam_activiteit = $request->input('activiteitNaam');
        $activiteit->Details_activiteit = $request->input('activiteitDetails');
        $activiteit->Begin_activiteit = $request->input('activiteitDatum');
        $activiteit->Eind_activiteit = $request->input('activiteitEindDatum'); 
        $activiteit->Locatie_activiteit = $request->input('activiteitLocatie');
        $activiteit->eten_inclusief = $request->input('eten');
        $activiteit->Kosten = $request->input('kosten');
        $activiteit->maximaal_deelnemers = $request->input('maxDeelnemers');
        $activiteit->image_path = '/storage/images/' . $imageName;
       
        // Save the activity to the database
        $activiteit->save();
        
        return redirect()->route('activiteitBeheer')->with('bericht', 'Activiteit toegevoegd met succes!');
    } catch (Exception $e) {
        return redirect()->route('activiteitBeheer')->with('error', 'Er is iets fout gegaan bij het aanmaken van de activiteit!');
    }
}

    /**
     * Display the specified resource.
     */
    public function show(activiteitBeheer $activiteitBeheer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(activiteitBeheer $activiteitBeheer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, activiteitBeheer $activiteitBeheer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(activiteitBeheer $activiteitBeheer)
    {
        //
    }
}