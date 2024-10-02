<?php

namespace App\Http\Controllers;

use App\Models\activiteit;
use App\Models\activiteitBeheer;
use Exception;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class ActiviteitBeheerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $minDate = activiteit::where('Begin_activiteit', '>=', Carbon::tomorrow())->min('Begin_activiteit');
        
        if (!$minDate) {
            $minDate = Carbon::tomorrow()->format('Y-m-d\TH:i');
        } else {
            $minDate = Carbon::parse($minDate)->format('Y-m-d\TH:i');
        }
        
        return view('activiteitBeheer', ['minDate' => $minDate]);
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
    try {
        // Validatie inclusief datumformaten
        $this->validate($request, [
            'activiteitDatum' => 'required|date_format:Y-m-d\TH:i',
            'activiteitEindDatum' => 'required|date_format:Y-m-d\TH:i|after_or_equal:activiteitDatum',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,gif,webp|max:2048',
        ]);
    
        // Opslaan van afbeelding
        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->storeAs('images', $imageName);
        }
    
        // Aanmaken van nieuwe activiteit
        $activiteit = new activiteit();
        $activiteit->naam_activiteit = $request->input('activiteitNaam');
        $activiteit->Details_activiteit = $request->input('activiteitDetails');
        $activiteit->Begin_activiteit = $request->input('activiteitDatum');
        $activiteit->Eind_activiteit = $request->input('activiteitEindDatum');
        $activiteit->Locatie_activiteit = $request->input('activiteitLocatie');
        $activiteit->eten_inclusief = $request->input('eten');
        $activiteit->Kosten = $request->input('kosten');
        $activiteit->maximaal_deelnemers = $request->input('maxDeelnemers');
        $activiteit->image_path = $imageName ? '/storage/app/public/images/' . $imageName : null;
    
        // Date validation with Carbon using Y-m-d format
        $startDate = Carbon::createFromFormat('Y-m-d\TH:i', $activiteit->Begin_activiteit);
        $endDate = Carbon::createFromFormat('Y-m-d\TH:i', $activiteit->Eind_activiteit);
    
        // Debugging: Output de ingangen om te checken op trailing data
        // dd($activiteit->Begin_activiteit, $activiteit->Eind_activiteit);
    
        // Controleer of de einddatum niet voor de begindatum ligt
        if ($endDate->lt($startDate)) {
            return redirect()->route('activiteitBeheer')->with('error', 'Einddatum mag niet voor de begindatum liggen.');
        }
    
        // Sla de activiteit op
        $activiteit->save();
    
        return redirect()->route('activiteitBeheer')->with('bericht', 'Activiteit toegevoegd met succes!');
    } catch (\Exception $e) {
        return redirect()->route('activiteitBeheer')->with('error', 'Er is iets misgegaan bij het toevoegen van de activiteit.');
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