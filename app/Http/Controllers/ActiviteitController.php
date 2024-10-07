<?php

namespace App\Http\Controllers;

use App\Models\activiteit;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\returnValue;

class ActiviteitController extends Controller
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
    public function show(activiteit $activiteit)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(activiteit $activiteit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, activiteit $activiteit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(activiteit $activiteit)
    {
        //
    }


}