<style>
    /* table, th, td {
  border: 1px solid;
} */
</style>
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
    <h1 class="text-2xl flex justify-center my-5">Activiteit Aanpassen!</h1>

        <h6 class="ml-[45%]">Alles met * is verplicht</h6>
        <form action="{{ route('activiteitBeheerEdit.update', $activiteit->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <table class="flex justify-center my-[20px]">
                <tr>
                    <td>
                        <div>
                            <label for="activiteitNaam" class="ml-10 mt-10">Naam Activiteit *</label>
                            <input required type="text" name="activiteitNaam" id="activiteitNaam" value="{{$activiteit->naam_activiteit}}" class="rounded border border-black ml-32 bg-slate-100">  
                        </div>
                    </td>
                    <td>
                        <div class="flex ml-10">
                            <label for="activiteitDetails" class="ml-10 mt-10">Details van activiteit</label>
                            <textarea id="activiteitDetails" name="activiteitDetails" rows="4" cols="50"  class="rounded border border-black ml-16 bg-slate-100 resize-none">{{ $activiteit->Details_activiteit }}</textarea>    
                        </div>
                    </td>
                </tr>
                <tr>
                    <td >
                        <div class="mt-10">
                            <label for="activiteitDatum" class="ml-10 mt-10">Begin van activiteit *</label>
                            <input required type="datetime-local" name="activiteitDatum" min="{{ $minDate }}" value="{{$activiteit->Begin_activiteit}}"  id="activiteitDatum" class="rounded border border-black ml-[6.5rem] bg-slate-100">    
                        </div>
                    </td>
                    <td>
                        <div class="mt-10 ml-10">
                            <label for="activititeitEindDatum" class="ml-10 mt-10">Einde van de activiteit *</label>
                            <input required type="datetime-local" name="activiteitEindDatum" min="{{ $minDate }}" value="{{$activiteit->Eind_activiteit}}"  id="activiteitEindDatum" class="rounded border border-black ml-9 bg-slate-100">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="mt-10">
                            <label for="activiteitLocatie" class="ml-10 mt-10">Locatie van activiteit *</label>
                            <input required type="text" name="activiteitLocatie" id="activiteitLocatie" value="{{$activiteit->Locatie_activiteit}}" class="rounded border border-black ml-24 bg-slate-100">
                        </div>
                    </td>
                    <td>
                        <div class="mt-10 ml-10" >
                            <label for="eten" class="ml-10 mt-10">Eten inclusief</label>
                            <label for="eten" class="ml-28">Ja</label>
                            <input type="hidden" name="eten" value="0">
                            <input  type="checkbox" value="1" id="eten" name="eten" {{ $activiteit->eten_inclusief ? 'checked' : '' }}>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="mt-10">
                            <label class="ml-10 mt-10" for="activiteitAfbeelding">Afbeelding voor de activiteit</label>
                            <input type="file" name="image" id="activiteitAfbeelding" value="{{$activiteit->image_path}}" class="rounded border border-black ml-[3.3rem]  bg-slate-100">
                        </div>
                    </td>
                    <td>
                        <div class="mt-10 ml-10">
                            <label class="ml-10 mt-10" for="kosten">Kosten</label>
                            <input type="text" name="kosten" id="kosten" value="{{$activiteit->Kosten}}" class="rounded border border-black ml-[9.5rem] bg-slate-100">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="mt-10 ">
                            <label for="maxDeelnemers" class="ml-10 mt-10"> maximaal aantal deelnemers *</label>
                            <input required type="number" min="1" name="maxDeelnemers" id="maxDeelnemers" value="{{$activiteit->maximaal_deelnemers}}" class="rounded border border-black ml-10 bg-slate-100">    
                        </div>
                    </td>
                </tr>
            </table>
            <div class="flex justify-center">
                <button class="bg-[#eeaf00] hover:bg-[#10132f] text-white font-bold py-2 px-4 rounded ml-10 mt-10">Aanpassen</button>
            </div>
        </form>
    </div>
</div>
@endsection