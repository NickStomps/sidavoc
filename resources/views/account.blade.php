@extends('layout')

@section('content')
<div class="flex justify-center mt-5 mb-10">
    <h1 class="text-4xl font-bold">events waar je aan deelneemt</h1>
</div>
<div class="all-activiteit flex content-around justify-center gap-4 flex-wrap w-[100%] mx-auto flex-row mb-10">
    <div class="w-[80%] mx-auto mt-10">
        <div class="flex flex-wrap gap-4">
            @php
             $heeftactiviteit = false;
            @endphp
            @foreach ($inschrijvingen as $inschrijving)
                @foreach ($activiteiten as $activiteit)
                    @if ($inschrijving->activiteit_id == $activiteit->id && $inschrijving->user_id == Auth::user()->id)
                @php
                    $heeftactiviteit = true;
                @endphp
             <div class="w-[23%] mb-8">
                    <a href="/activiteitendetails/{{$activiteit->id}}" class="transform bg-white w-full transition duration-500 hover:scale-105 flex justify-center items-center shadow-lg">
                        <div class="w-full h-full flex flex-col justify-between">
                            <div class="w-full h-[200px] bg-gray-300 rounded-t-lg">
                                <img src="{{ $activiteit->image_path ? Vite::asset($activiteit->image_path) : Vite::asset('/resources/images/logo_covadis_2016.png') }}" alt="Activiteit Image" class="w-full h-full {{ $activiteit->image_path ? 'object-cover' : 'object-scale-down' }} rounded-t-lg">
                            </div>
                            <div class="w-full p-4">
                                <h1 class="text-xl font-bold">{{ $activiteit->naam_activiteit }}</h1>
                                <p class="mt-2">{{ $activiteit->Details_activiteit }}</p>
                                <div class="flex justify-between mt-4 text-sm text-gray-500">
                                    <span class="opacity-75">{{ \Carbon\Carbon::parse($activiteit->Begin_activiteit)->format('Y-m-d H:i') }}</span>
                                    <span class="opacity-75">{{$activiteit->deelnemers}} / {{ $activiteit->maximaal_deelnemers }}</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div> 
            @endif
                @endforeach
            @endforeach
            @if ($heeftactiviteit == false)
                <div class="w-full flex justify-center">
                    <h1 class="text-2xl font-bold">Je hebt nog geen activiteiten waar je aan deelneemt</h1>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection