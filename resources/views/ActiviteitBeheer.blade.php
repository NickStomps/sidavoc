@extends('layout')

@section("content")
@if(\Session::has('bericht'))
<div class="bg-green-600 rounded w-1/2 m-auto text-center border-black border">
    <p class="text-white text-lg m-2">{!! \Session::get('bericht') !!}</p>
</div>
@endif
@if(\Session::has('error'))
<div class="bg-red-600 rounded w-1/2 m-auto text-center border-black border"> 
    <p class="text-white text-lg m-2">{!! \Session::get('error') !!}</p>
</div>
@endif
<div class="w-full">
    <h1 class="text-2xl flex justify-center my-5">Activiteit Toevoegen!</h1>

    
        <form action="/activiteitBeheer/save" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="w-full flex flex-col items-center mb-10">            
                <div class="flex ml-10 flex-col w-[33%]">
                    <label for="activiteitNaam" class="ml-10 mt-10">Naam Activiteit *</label>
                    <input required type="text" name="activiteitNaam" id="activiteitNaam" class="rounded border border-black ml-10 bg-slate-100">
                </div>
                <div class="flex ml-10 flex-col w-[33%]">
                    <label for="activiteitDetails" class="ml-10 mt-10">Details van activiteit</label>
                    <textarea id="activiteitDetails" name="activiteitDetails" rows="4" cols="50"  class="rounded border border-black ml-10 bg-slate-100 resize-none"></textarea>
                </div>
                <div class="flex ml-10 flex-col w-[33%]">
                    <label for="activiteitDatum" class="ml-10 mt-10">Begin van activiteit *</label>
                    <input required type="datetime-local" name="activiteitDatum" min="{{ $minDate }}"  id="activiteitDatum" class="rounded border border-black ml-10 bg-slate-100">
                </div>
                    <div class="flex ml-10 flex-col w-[33%]">
                    <label for="activititeitEindDatum" class="ml-10 mt-10">Einde van de activiteit *</label>
                    <input required type="datetime-local" name="activiteitEindDatum" min="{{ $minDate }}"  id="activiteitEindDatum" class="rounded border border-black ml-10 bg-slate-100">
                </div>
                <div class="flex ml-10 flex-col w-[33%]">
                    <label for="activiteitLocatie" class="ml-10 mt-10">Locatie van activiteit *</label>
                    <input required type="text" name="activiteitLocatie" id="activiteitLocatie" class="rounded border border-black ml-10 bg-slate-100">
                </div>
                <div class="ml-10 mt-10">
                    <label for="eten" class="ml-10 mt-10">Eten inclusief</label>
                    
                    <label for="eten" class="ml-10">Ja</label>
                    <input type="hidden" name="eten" value="0">
                    <input  type="checkbox" value="1" id="eten" name="eten">
                </div>
                <div class="flex ml-10 flex-col w-[20%]">
                    <label class="ml-10 mt-10" for="activiteitAfbeelding">Afbeelding voor de activiteit</label>
                    <input type="file" name="image" id="activiteitAfbeelding" class="rounded border border-black ml-10 bg-slate-100">
                </div>
                <div class="flex ml-10 flex-col w-[20%]">
                    <label class="ml-10 mt-10" for="kosten">Kosten</label>
                    
                    <input type="text" name="kosten" id="kosten" class="rounded border border-black ml-10 bg-slate-100">
                </div>
                <div class="flex ml-10 flex-col w-[20%]">
                    <label for="maxDeelnemers" class="ml-10 mt-10"> maximaal aantal deelnemers *</label>
                    <input required type="number" min="1" name="maxDeelnemers" id="maxDeelnemers" class="rounded border border-black ml-10 bg-slate-100">
                </div>
                <div>
                    <button class="bg-[#eeaf00] hover:bg-[#10132f] text-white font-bold py-2 px-4 rounded ml-10 mt-10">Toevoegen</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection