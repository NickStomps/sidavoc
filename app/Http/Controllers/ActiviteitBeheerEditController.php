<?php

namespace App\Http\Controllers;

use App\Models\ActiviteitBeheerEdit;
use App\Models\activiteit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ActiviteitBeheerEditController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

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
        $activiteit = activiteit::find(request('id'));

    $minDate = activiteit::where('Begin_activiteit', '>=', Carbon::tomorrow())->min('Begin_activiteit');
    
    if (!$minDate) {
        $minDate = Carbon::tomorrow()->format('Y-m-d\TH:i');
    } else {
        $minDate = Carbon::parse($minDate)->format('Y-m-d\TH:i');
    }

    return view('activiteitBeheerEdit', [
        'activiteit' => $activiteit,
        'minDate' => $minDate
    ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ActiviteitBeheerEdit $activiteitBeheerEdit)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
        $request->validate([
            'activiteitNaam' => 'required|string|max:255',
            'activiteitDetails' => 'nullable|string',
            'activiteitDatum' => 'required|date',
            'activiteitEindDatum' => 'required|date',
            'activiteitLocatie' => 'required|string|max:255',
            'eten' => 'required|boolean',
            'kosten' => 'required|numeric',
            'maxDeelnemers' => 'required|integer|min:1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->only([
            'activiteitNaam',
            'activiteitDetails',
            'activiteitDatum',
            'activiteitEindDatum',
            'activiteitLocatie',
            'eten',
            'kosten',
            'maxDeelnemers'
        ]);

        Log::info('Updating activity with data: ', $data);

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->storeAs('/public/images', $imageName);
            $data['image_path'] = 'storage/app/public/images/'. $imageName;
        }

        $activiteit = activiteit::find($request->id);
        $activiteit->update([
            'naam_activiteit' => $data['activiteitNaam'],
            'Details_activiteit' => $data['activiteitDetails'],
            'Begin_activiteit' => $data['activiteitDatum'],
            'Eind_activiteit' => $data['activiteitEindDatum'],
            'Locatie_activiteit' => $data['activiteitLocatie'],
            'eten_inclusief' => $data['eten'],
            'Kosten' => $data['kosten'],
            'maximaal_deelnemers' => $data['maxDeelnemers'],
            'image_path' => $data['image_path'] ?? $activiteit->image_path,
        ]);

        Log::info('Activity updated successfully: ', ['id' => $id]);

        $activiteit = Activiteit::findOrFail($id);
        $activiteit->update($data);

        return redirect('/');
    } catch (\Exception $e) {

        Log::error('Error updating activity: ', ['error' => $e->getMessage()]);
        return redirect()->route('activiteitBeheerEdit.show', ['id' => $id])
                ->with('error', 'Er is iets misgegaan bij het bijwerken van de activiteit.');
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ActiviteitBeheerEdit $activiteitBeheerEdit)
    {
        //
    }
}
