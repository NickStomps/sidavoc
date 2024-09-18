@extends('layout')

@section('content')

@php
// Mock up data om te testen
$activiteiten = [
    ['title' => 'Titel 1', 'description' => 'Beschrijving voorbeeld text 1', 'date' => '08/09/2024', 'participants' => 14],
    ['title' => 'Titel 2', 'description' => 'Beschrijving voorbeeld text 2', 'date' => '09/11/2024', 'participants' => 20],
    ['title' => 'Titel 3', 'description' => 'Beschrijving voorbeeld text 3', 'date' => '18/09/2024', 'participants' => 30],
    ['title' => 'Titel 4', 'description' => 'Beschrijving voorbeeld text 4', 'date' => '07/01/2024', 'participants' => 25],
    ['title' => 'Titel 5', 'description' => 'Beschrijving voorbeeld text 5, dit is een voorbeeld', 'date' => '12/11/2024', 'participants' => 18],
];

// DIT WORDT LATER DOOR DE CONTROLLER GEHANDELD

// Datum van vandaag
$vandaag = date('d/m/Y');

// Filter de activiteiten uit die al zijn geweest
$filteredActiviteiten = array_filter($activiteiten, function($activiteit) use ($vandaag) {
    $activiteitDatum = DateTime::createFromFormat('d/m/Y', $activiteit['date']);
    $datumVandaag = DateTime::createFromFormat('d/m/Y', $vandaag);
    return $activiteitDatum >= $datumVandaag;
});

// Sorteer activeiten door datum
usort($filteredActiviteiten, function($a, $b) {
    $dateA = DateTime::createFromFormat('d/m/Y', $a['date']);
    $dateB = DateTime::createFromFormat('d/m/Y', $b['date']);
    return $dateA <=> $dateB;
});

// Groepeer activiteiten door datum
$groupedActiviteiten = [];
foreach ($filteredActiviteiten as $activiteit) {
    $groupedActiviteiten[$activiteit['date']][] = $activiteit;
}
@endphp

{{-- Container --}}
<div class="w-[80%] mx-auto mt-10">

    <h1 class="text-3xl font-bold mb-8">AANKOMENDE ACTIVITEITEN</h1>
    {{-- Loop door gegroepeerde activiteiten --}}
    @foreach ($groupedActiviteiten as $date => $activities)
        <div class="mb-8">
            <div class="relative mb-4">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-300 opacity-50"></div>
                </div>
                <h2 class="relative text-2xl font-bold bg-white px-4">{{ \Carbon\Carbon::createFromFormat('d/m/Y', $date)->format('F j, Y') }}</h2>
                <br>
                <hr>
            </div>
            <div class="flex flex-wrap gap-4">
                @foreach ($activities as $activiteit)
                {{-- Card --}}
                    <a href="#" class="w-[35%]">
                        <div class="flex flex-wrap bg-gray-100 shadow-lg p-4 rounded-lg">
                            <div class="w-full h-[200px] bg-gray-300 rounded-t-lg"></div>
                            <div class="w-full p-4">
                                <h1 class="text-xl font-bold">{{ $activiteit['title'] }}</h1>
                                <p class="mt-2">{{ $activiteit['description'] }}</p>
                                <div class="flex justify-between mt-4 text-sm text-gray-500">
                                    <span class="opacity-75">{{ $activiteit['date'] }}</span>
                                    <span class="opacity-75">Aantal deelnemers: {{ $activiteit['participants'] }}</span>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    @endforeach
</div>
@endsection