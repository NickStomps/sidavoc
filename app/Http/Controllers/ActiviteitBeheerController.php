<?php

namespace App\Http\Controllers;

use App\Models\activiteitBeheer;
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
        //
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