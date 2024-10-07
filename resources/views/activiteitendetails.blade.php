@extends('layout')

@section('content')
<div class="my-10 w-full flex items-center flex-col flex-wrap">
    <div class="w-full h-[200px] bg-gray-300 rounded-t-lg mb-10">
        <img src="{{ Vite::asset($activiteit->image_path) }}" alt="Activiteit Image" class="w-full h-full object-cover rounded-t-lg">
    </div>
    <div class="flex justify-between w-[80%] mx-[128px] mb-10">
        <h1 class="text-3xl">{{$activiteit->naam_activiteit}}</h1>
        <button class="bg-[#EEAF00] rounded-md text-2xl">Inschrijven</button>
    </div>
    <p class="text-xl mx-[128px]">
        @if ($activiteit->Details_activiteit == null)
        Deze activiteit heeft geen beschrijving.
        @else
        {{$activiteit->Details_activiteit}}
        @endif
    </p>
    <div class="flex justify-between w-[80%] mx-[128px] mt-10 mb-10">
        <div class="flex flex-col">
            <h2 class="text-2xl">Locatie</h2>
            <p class="text-xl">{{$activiteit->Locatie_activiteit}}</p>
        </div>
        <div class="flex flex-col">
            <h2 class="text-2xl">Datum</h2>
            <p class="text-xl">{{\Carbon\Carbon::parse($activiteit->Begin_activiteit)->format('Y-m-d H:i')}}</p>
        </div>
        <div class="flex flex-col">
            <h2 class="text-2xl">Tijd</h2>
            <p class="text-xl">{{\Carbon\Carbon::parse($activiteit->Eind_activiteit)->format('Y-m-d H:i')}}</p>
        </div>
        @if ($activiteit->Koster != null)
        <div class="flex flex-col">
            <h2 class="text-2xl">Kosten</h2>
            <p class="text-xl">€{{$activiteit->Kosten}},-</p>
        </div>
        @endif
        <div class="flex flex-col">
            <h2 class="text-2xl">Aantal deelmeners</h2>
            <p class="text-xl">0/ {{$activiteit->maximaal_deelnemers}}</p>
        </div>
        <div class="flex flex-col">
            <h2 class="text-2xl">Inclusief eten:</h2>
            <p class="text-xl">
                @if ($activiteit->Eten == 1)
                Ja
                @else
                Nee
                @endif
            </p>
        </div>
    </div>
</div>
@endsection