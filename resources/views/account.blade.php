@extends('layout')

@section('content')

<div class="flex items-end flex-end flex-col mt-5 mb-10 mr-5">
    <h1 class="text-4xl font-bold mt-5 mb-10">Welkom {{ Auth::user()->name }}</h1>
    <p>Wachtwoord veranderen?</p>
    <a href="/logout">Uitloggen?</a>
</div>
<div class="flex justify-center mt-5 mb-10">
    <h1 class="text-4xl font-bold">events waar je aan deelneemt</h1>
</div>
<div class="all-activiteit flex content-around justify-center gap-4 flex-wrap w-[100%] mx-auto flex-row mb-10">
<div class="w-[80%] mx-auto mt-10">

<div class="flex flex-wrap gap-7">
    @foreach ($activiteiten as $activiteit)
        <div class="w-[23%] mb-8">
            <a href="/activiteitendetails/{{$activiteit->id}}" class="block">
                <div class="flex flex-wrap bg-gray-100 shadow-lg p-4 rounded-lg">
                    <div class="w-full h-[200px] bg-gray-300 rounded-t-lg">
                        <img src="{{ $activiteit->image_path ? Vite::asset($activiteit->image_path) : Vite::asset('/resources/images/logo_covadis_2016.png') }}" alt="Activiteit Image" class="w-full h-full {{ $activiteit->image_path ? 'object-cover' : 'object-scale-down' }} rounded-t-lg">
                    </div>
                    <div class="w-full p-4">
                        <h1 class="text-xl font-bold">{{ $activiteit->naam_activiteit }}</h1>
                        <p class="mt-2">{{ $activiteit->Details_activiteit }}</p>
                        <div class="flex justify-between mt-4 text-sm text-gray-500">
                            <span class="opacity-75">{{ $activiteit->Begin_activiteit }}</span>
                            <span class="opacity-75">{{ $activiteit ->maximaal_deelnemers }}</span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
</div>
</div>
    <!-- <a href="#" class="w-80">
        <div class="flex flex-wrap w-[70%] bg-gray-100 shadow-lg p-4 rounded-lg">
            <div class="w-full h-[150px] bg-gray-300 rounded-t-lg"></div>
            <div class="w-full p-4">
                <h1 class="text-xl font-bold">Titel</h1>
                <p class="mt-2">Beschrijving voorbeeld text, dit is een voorbeeld</p>
                <div class="flex justify-between mt-4 text-sm text-gray-500">
                    <span class="opacity-75">09/11/2024</span>
                    <span class="opacity-75">Aantal deelnemers: 14</span>
                </div>
            </div>
        </div>
    </a>
    <a href="#" class="w-80">
        <div class="flex flex-wrap w-[70%] bg-gray-100 shadow-lg p-4 rounded-lg">
            <div class="w-full h-[150px] bg-gray-300 rounded-t-lg"></div>
            <div class="w-full p-4">
                <h1 class="text-xl font-bold">Titel</h1>
                <p class="mt-2">Beschrijving voorbeeld text, dit is een voorbeeld</p>
                <div class="flex justify-between mt-4 text-sm text-gray-500">
                    <span class="opacity-75">09/11/2024</span>
                    <span class="opacity-75">Aantal deelnemers: 14</span>
                </div>
            </div>
        </div>
    </a>
    <a href="#" class="w-80">
        <div class="flex flex-wrap w-[70%] bg-gray-100 shadow-lg p-4 rounded-lg">
            <div class="w-full h-[150px] bg-gray-300 rounded-t-lg"></div>
            <div class="w-full p-4">
                <h1 class="text-xl font-bold">Titel</h1>
                <p class="mt-2">Beschrijving voorbeeld text, dit is een voorbeeld</p>
                <div class="flex justify-between mt-4 text-sm text-gray-500">
                    <span class="opacity-75">09/11/2024</span>
                    <span class="opacity-75">Aantal deelnemers: 14</span>
                </div>
            </div>
        </div>
    </a>
    <a href="#" class="w-80">
        <div class="flex flex-wrap w-[70%] bg-gray-100 shadow-lg p-4 rounded-lg">
            <div class="w-full h-[150px] bg-gray-300 rounded-t-lg"></div>
            <div class="w-full p-4">
                <h1 class="text-xl font-bold">Titel</h1>
                <p class="mt-2">Beschrijving voorbeeld text, dit is een voorbeeld</p>
                <div class="flex justify-between mt-4 text-sm text-gray-500">
                    <span class="opacity-75">09/11/2024</span>
                    <span class="opacity-75">Aantal deelnemers: 14</span>
                </div>
            </div>
        </div>
    </a>
    <a href="#" class="w-80">
        <div class="flex flex-wrap w-[70%] bg-gray-100 shadow-lg p-4 rounded-lg">
            <div class="w-full h-[150px] bg-gray-300 rounded-t-lg"></div>
            <div class="w-full p-4">
                <h1 class="text-xl font-bold">Titel</h1>
                <p class="mt-2">Beschrijving voorbeeld text, dit is een voorbeeld</p>
                <div class="flex justify-between mt-4 text-sm text-gray-500">
                    <span class="opacity-75">09/11/2024</span>
                    <span class="opacity-75">Aantal deelnemers: 14</span>
                </div>
            </div>
        </div>
    </a>
    <a href="#" class="w-80">
        <div class="flex flex-wrap w-[70%] bg-gray-100 shadow-lg p-4 rounded-lg">
            <div class="w-full h-[150px] bg-gray-300 rounded-t-lg"></div>
            <div class="w-full p-4">
                <h1 class="text-xl font-bold">Titel</h1>
                <p class="mt-2">Beschrijving voorbeeld text, dit is een voorbeeld</p>
                <div class="flex justify-between mt-4 text-sm text-gray-500">
                    <span class="opacity-75">09/11/2024</span>
                    <span class="opacity-75">Aantal deelnemers: 14</span>
                </div>
            </div>
        </div>
    </a>
    <a href="#" class="w-80">
        <div class="flex flex-wrap w-[70%] bg-gray-100 shadow-lg p-4 rounded-lg">
            <div class="w-full h-[150px] bg-gray-300 rounded-t-lg"></div>
            <div class="w-full p-4">
                <h1 class="text-xl font-bold">Titel</h1>
                <p class="mt-2">Beschrijving voorbeeld text, dit is een voorbeeld</p>
                <div class="flex justify-between mt-4 text-sm text-gray-500">
                    <span class="opacity-75">09/11/2024</span>
                    <span class="opacity-75">Aantal deelnemers: 14</span>
                </div>
            </div>
        </div>
    </a>
    <a href="#" class="w-80">
        <div class="flex flex-wrap w-[70%] bg-gray-100 shadow-lg p-4 rounded-lg">
            <div class="w-full h-[150px] bg-gray-300 rounded-t-lg"></div>
            <div class="w-full p-4">
                <h1 class="text-xl font-bold">Titel</h1>
                <p class="mt-2">Beschrijving voorbeeld text, dit is een voorbeeld</p>
                <div class="flex justify-between mt-4 text-sm text-gray-500">
                    <span class="opacity-75">09/11/2024</span>
                    <span class="opacity-75">Aantal deelnemers: 14</span>
                </div>
            </div>
        </div> -->
    </a>
</div>
@endsection