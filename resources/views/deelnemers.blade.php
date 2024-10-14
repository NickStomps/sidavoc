@extends('layout')
@section('content')
<div class="flex justify-center flex-col">
    <h1 class="text-3xl font-bold mb-8">Deelnemers</h1>
    <table class="border border-black">
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
    </tr>
    @endforeach
</table>
</div>
@endsection