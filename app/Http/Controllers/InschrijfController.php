<?php

namespace App\Http\Controllers;

use App\Models\activiteit;
use App\Models\inschrijf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; 


class InschrijfController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //inschrijvingen opslaan
        
    }

    public function saveEmail(Request $request)
    {
        try {
            // kijken of de gebruiker niet is ingelogd
            if (!auth()->check()) {
                $this->validate($request, [
                    'email' => 'required|email',
                ]);
            }

            // nieuwe inschrijf maken
            $inschrijf = new inschrijf();
            $inschrijf->activiteit_id = $request->activiteit_id;
            $inschrijf->opmerking = $request->opmerking;

            // als de gebruiker is geauthenticeerd, gebruik user_id en user_email
            if (auth()->check()) {
                $inschrijf->user_id = auth()->user()->id;
                $inschrijf->user_email = auth()->user()->email;
                $inschrijf->opmerking = $request->opmerking; 
            } else {
                // geen gebruiker ingelogd, gebruik email van de request veld
                $inschrijf->user_email = $request->email;
                $inschrijf->naam = $request->naam;
                session(['guest_email' => $request->email]); // sla de gast email op in een sessie
            }

            // Save the inschrijving
            $inschrijf->save();

            return redirect()->back()->with('success', 'Je bent succesvol ingeschreven.');
        } catch (\Exception $e) {
            return redirect()->route('activiteitendetails', ['id' => $request->activiteit_id])->with('error', $e->getMessage());
        }
    }


    public function showActiviteit($activiteit_id)
    {
        try {
            $activiteit = activiteit::find($activiteit_id);

            // Controleer of de gebruiker is ingelogd
            if (auth()->check()) {
                // Geregistreerde gebruiker
                $isIngeschreven = inschrijf::where('activiteit_id', $activiteit_id)
                    ->where('user_id', auth()->user()->id)
                    ->exists();
            } else {
                // Gastgebruiker op basis van email in de sessie
                $guestEmail = session('guest_email');
                $isIngeschreven = inschrijf::where('activiteit_id', $activiteit_id)
                    ->where('user_email', $guestEmail)
                    ->exists();
            }

            // Stuur de variabele $isIngeschreven naar de view
            return view('activiteitendetails', [
                'activiteit' => $activiteit,
                'isIngeschreven' => $isIngeschreven
            ]);

        } catch (\Exception $e) {
            return redirect()->route('activiteitendetails')->with('error', 'Er is iets misgegaan bij het laden van de activiteit.');
        }
    }
    public function uitschrijven(Request $request)
{
    $request->validate([
        'activiteit_id' => 'required|integer',
    ]);

    try {
        // Controleer of de gebruiker ingelogd is
        if (auth()->check()) {
            // Uitschrijven voor ingelogde gebruiker
            inschrijf::where('activiteit_id', $request->activiteit_id)
                ->where('user_id', auth()->user()->id)
                ->delete();
        } else {
            // Uitschrijven voor gast op basis van e-mail in sessie
            $guestEmail = session('guest_email');
            inschrijf::where('activiteit_id', $request->activiteit_id)
                ->where('user_email', $guestEmail)
                ->delete();
        }

        // Redirect terug naar de homepagina met succesmelding
        return redirect('/')->with('success', 'Je bent succesvol uitgeschreven.');
    } catch (\Exception $e) {
        // Redirect terug naar de homepagina met foutmelding
        return redirect('/')->with('error', 'Er is iets misgegaan bij het uitschrijven.');
    }
}
    /**
     * Display the specified resource.
     */
    public function show(inschrijf $inschrijf)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(inschrijf $inschrijf)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, inschrijf $inschrijf)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(inschrijf $inschrijf)
    {
        //
    }
}