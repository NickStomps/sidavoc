@extends('layout')

@section("content")
<div class="w-full">
    <h1 class="text-2xl flex justify-center my-5">Activiteit Toevoegen!</h1>
        <form action="">
            <div class="w-full flex flex-col items-center mb-10">            
                <div class="flex ml-10 flex-col w-[33%]">
                    <label for="activiteitNaam" class="ml-10 mt-10">Naam Activiteit</label>
                    <input type="text" name="activiteitNaam" id="activiteitNaam" class="rounded border border-black ml-10 bg-slate-100">
                </div>
                <div class="flex ml-10 flex-col w-[33%]">
                    <label for="activiteitDetails" class="ml-10 mt-10">Details van activiteit</label>
                    <textarea id="activiteitDetails" name="activiteitDetails" rows="4" cols="50"  class="rounded border border-black ml-10 bg-slate-100 resize-none"></textarea>
                </div>
                <div class="flex ml-10 flex-col w-[33%]">
                    <label for="activiteitDatum" class="ml-10 mt-10">Begin van activiteit</label>
                    <input type="datetime-local" name="activiteitDatum" id="activiteitDatum" class="rounded border border-black ml-10 bg-slate-100">
                </div>
                    <div class="flex ml-10 flex-col w-[33%]">
                    <label for="activititeitEindDatum" class="ml-10 mt-10">Eind tijd van de activiteit</label>
                    <input type="datetime-local" name="activititeitEindDatum" id="activititeitEindDatum" class="rounded border border-black ml-10 bg-slate-100">
                </div>
                <div class="flex ml-10 flex-col w-[33%]">
                    <label for="activiteitLocatie" class="ml-10 mt-10">Locatie van activiteit</label>
                    <input type="text" name="activiteitLocatie" id="activiteitLocatie" class="rounded border border-black ml-10 bg-slate-100">
                </div>
                <div class="ml-10 mt-10">
                    <label for="eten" class="ml-10 mt-10">Eten inclusief</label>
                    
                    <label for="eten" class="ml-10">Ja</label>
                    <input type="radio" id="eten" name="eten">

                    <label for="eten" class="ml-10">Nee</label>
                    <input type="radio" id="eten" name="eten">
                </div>
                <div class="flex ml-10 flex-col w-[20%]">
                    <label class="ml-10 mt-10" for="activiteitAfbeelding">Afbeelding voor de activiteit</label>
                    <input type="file" name="activiteitAfbeelding" id="activiteitAfbeelding" class="rounded border border-black ml-10 bg-slate-100">
                </div>
                <div class="flex ml-10 flex-col w-[20%]">
                    <label class="ml-10 mt-10" for="kosten">Kosten</label>
                    <input type="text" name="kosten" id="kosten" class="rounded border border-black ml-10 bg-slate-100">
                </div>
                <div class="flex ml-10 flex-col w-[20%]">
                    <label for="maxDeelnemers" class="ml-10 mt-10"> maximaal aantal deelnemers</label>
                    <input type="number" name="maxDeelnemers" id="maxDeelnemers" class="rounded border border-black ml-10 bg-slate-100">
                </div>
                <div>
                    <button class="bg-[#eeaf00] hover:bg-[#10132f] text-white font-bold py-2 px-4 rounded ml-10 mt-10">Toevoegen</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection