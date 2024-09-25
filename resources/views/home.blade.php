@extends('layout')

@section('content')  

@php
// Mock up data om te testen
$activiteiten = [
    ['title' => 'Titel 1', 'description' => 'Beschrijving voorbeeld text 1', 'date' => '18/09/2024', 'deelnemers' => 14],
    ['title' => 'Titel 2', 'description' => 'Beschrijving voorbeeld text 2', 'date' => '11/11/2024', 'deelnemers' => 20],
    ['title' => 'Titel 3', 'description' => 'Beschrijving voorbeeld text 3', 'date' => '12/11/2024', 'deelnemers' => 30],
    ['title' => 'Titel 4', 'description' => 'Beschrijving voorbeeld text 4', 'date' => '13/11/2024', 'deelnemers' => 25],
    ['title' => 'Titel 5', 'description' => 'Beschrijving voorbeeld text 5, dit is een voorbeeld', 'date' => '14/11/2024', 'deelnemers' => 18],
];

$vandaag = date('d/m/Y');

@endphp

{{-- Container --}}
<div class="w-[80%] mx-auto mt-10">

    <h1 class="text-3xl font-bold mb-8">AANKOMENDE ACTIVITEITEN</h1>
    @foreach ($activiteiten as $activiteit)
        <div class="mb-8">
            <div class="relative mb-4">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-300 opacity-50"></div>
                </div>
                <h2 class="relative text-2xl font-bold bg-white px-4">{{ \Carbon\Carbon::createFromFormat('d/m/Y', $activiteit['date'])->format('F j, Y') }}</h2>
                <br>
                <hr>
            </div>
            <div class="flex flex-wrap gap-4">
                {{-- Card --}}
                    <a href="/activiteit" class="w-[35%]">
                        <div class="flex flex-wrap bg-gray-100 shadow-lg p-4 rounded-lg">
                            <div class="w-full h-[200px] bg-gray-300 rounded-t-lg"></div>
                            <div class="w-full p-4">
                                <h1 class="text-xl font-bold">{{ $activiteit['title'] }}</h1>
                                <p class="mt-2">{{ $activiteit['description'] }}</p>
                                <div class="flex justify-between mt-4 text-sm text-gray-500">
                                    <span class="opacity-75">{{ $activiteit['date'] }}</span>
                                    <span class="opacity-75">Aantal deelnemers: {{ $activiteit['deelnemers'] }}</span>
                                </div>
                            </div>
                        </div>
                    </a>
            </div>
        </div>
    @endforeach
</div>
@endsection