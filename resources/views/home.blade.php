@extends('layout')

@section('content')  

{{-- Container --}}
<div class="w-[80%] mx-auto mt-10">

    <h1 class="text-3xl font-bold mb-8">AANKOMENDE ACTIVITEITEN</h1>
    <div class="flex flex-wrap gap-4">
        @foreach ($activiteiten as $activiteit)
            <div class="w-[23%] mb-8">
                <a href="/activiteit" class="transform bg-white w-full transition duration-500 hover:scale-105 flex justify-center items-center shadow-lg">
                    <div class="w-full h-full flex flex-col justify-between">
                        <div class="w-full h-[200px] bg-gray-300 rounded-t-lg">
                            <img src="{{ Vite::asset($activiteit->image_path) }}" alt="Activiteit Image" class="w-full h-full object-cover rounded-t-lg">
                        </div>
                        <div class="w-full p-4">
                            <h1 class="text-xl font-bold">{{ $activiteit->naam_activiteit }}</h1>
                            <p class="mt-2">{{ $activiteit->Details_activiteit }}</p>
                            <div class="flex justify-between mt-4 text-sm text-gray-500">
                                <span class="opacity-75">{{ $activiteit->Begin_activiteit }}</span>
                                <span class="opacity-75">{{ $activiteit->maximaal_deelnemers }}</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection