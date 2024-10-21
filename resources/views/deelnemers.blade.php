@extends('layout')
@section('content')
@if($deelnemers->count() > 0)
<div class=" flex justify-center flex-col">
    <h1 class="text-3xl font-bold mb-8 mx-auto my-0">Deelnemers</h1>
    <table class="border border-black mx-10">
        <tr>
            <td class="border border-black">ID</td>
            <td class="border border-black">User ID</td>
            <td class="border border-black">Naam</td>
            <td class="border border-black">Email</td>
            <td class="border border-black">opmerking:</td>
        </tr>
        @foreach ($deelnemers as $deelnemer)
        <tr>
            <td class="border border-black">{{$deelnemer->id}}</td>
            @if ($deelnemer->user_id == null)
            <td class="border border-black">Deze deelneemer heeft geen account</td>
            @else
            <td class="border border-black">{{$deelnemer->user_id}}</td>
            @endif
            <td class="border border-black">{{$deelnemer->naam}}</td>
            <td class="border border-black">{{$deelnemer->user_email}}</td>
            @if ($deelnemer ->opmerking == null)
            <td class="border border-black">Deze deelnemer heeft geen opmerking geplaatst</td>
            @else
            <td class="border border-black">{{$deelnemer->opmerking}}</td>
            @endif
            <td class="border border-black">
                <form method="POST" action="/deelnemers/delete/{{$deelnemer->id}}" class="flex justify-center">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="deelnemer_id" value="{{$deelnemer->id}}">
                    <button type="submit" class="bg-[#EEAF00] rounded-md text-2xl flex items-center justify-center px-4 py-2 my-1">Uitschrijven</button>
                </form>
        </tr>
        @endforeach
    </table>
</div>
@else
<p class="text-2xl font-bold mb-8 flex justify-center">Er zijn geen deelnemers voor deze activiteit</p>
@endif
@endsection