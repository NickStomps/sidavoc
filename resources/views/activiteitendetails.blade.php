@extends('layout')

@section('content')
<div class=" w-full flex items-center flex-col flex-wrap ">
    <div class="w-[80%] mt-3 h-[20rem] bg-gray-300 rounded-lg mb-10">
        <img src="{{ $activiteit->image_path ? Vite::asset($activiteit->image_path) : Vite::asset('/resources/images/logo_covadis_2016.png') }}" alt="Activiteit Image" class="w-full rounded-lg h-full {{ $activiteit->image_path ? '' : 'object-scale-down' }}">    
    </div>
    <div class="flex justify-between w-[80%] mx-[128px] mb-10">
        <h1 class="text-3xl">{{$activiteit->naam_activiteit}}</h1>
        <button class="bg-[#EEAF00] rounded-md text-2xl">Inschrijven</button>
    </div>
    <p class="text-xl w-[80%] mx-[128px]">
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
        @if ($activiteit->Kosten != null)
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
                @if ($activiteit->eten_inclusief == 1)
                Ja
                @else
                Nee
                @endif
            </p>
        </div>
    </div>
</div>
@endsection