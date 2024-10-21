@extends('layout')

@section('content')  

{{-- Container --}}
<div class="w-[80%] mx-auto mt-10">

    @if(session()->has('success'))
        <div class="bg-green-600 rounded w-1/2 m-auto text-center border-black border">
            <p class="text-white text-lg m-2">{{ session('success') }}</p>
        </div>
    @endif

    @if(session()->has('error'))
        <div class="bg-red-600 rounded w-1/2 m-auto text-center border-black border"> 
            <p class="text-white text-lg m-2">{{ session('error') }}</p>
        </div>
    @endif
    <h1 class="text-3xl font-bold mb-8">AANKOMENDE ACTIVITEITEN</h1>

    <div class="flex flex-wrap gap-4">
        @foreach ($aankomendeActiviteiten as $activiteit)
            <div class="w-[23%] mb-8">
                <a href="/activiteitendetails/{{$activiteit->id}}" class="transform bg-white w-full transition duration-500 hover:scale-105 flex flex-col justify-between items-center shadow-lg min-h-[350px]">
                    <div class="w-full h-[200px] bg-gray-300 rounded-t-lg">
                        <img src="{{ $activiteit->image_path ? Vite::asset($activiteit->image_path) : Vite::asset('/resources/images/logo_covadis_2016.png') }}" alt="Activiteit Image" class="w-full h-full {{ $activiteit->image_path ? 'object-cover' : 'object-scale-down' }} rounded-t-lg">
                    </div>
                    <div class="w-full p-4 flex flex-col flex-grow">
                        <h1 class="text-xl font-bold">{{ $activiteit->naam_activiteit }}</h1>
                        <p class="mt-2 flex-grow">{{ \Illuminate\Support\Str::limit($activiteit->Details_activiteit, 35, '...') }}</p>
                        <div class="flex justify-between mt-4 text-sm text-gray-500">
                            <span class="opacity-75">{{ \Carbon\Carbon::parse($activiteit->Begin_activiteit)->format('d-m-Y H:i') }}</span>
                            <span class="opacity-75">{{$activiteit->deelnemers}}/{{ $activiteit->maximaal_deelnemers }}</span>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection