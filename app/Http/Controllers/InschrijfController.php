<?php

namespace App\Http\Controllers;

use App\Models\inschrijf;
use Illuminate\Http\Request;

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

    /**
     * Display the specified resource.
     */
    public function show(inschrijf $deelnemers)
    {
        $deelnemers = inschrijf::where('activiteit_id', request('id'))->get();
        return view('deelnemers', ['deelnemers' => $deelnemers]);
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