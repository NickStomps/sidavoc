@extends('layout')

@section('content')
<div class="my-10 w-full flex items-center flex-col flex-wrap">
    <div class="w-full h-[200px] bg-gray-300 rounded-t-lg mb-10"></div>
    <div class="flex justify-between w-[80%] mx-[128px] mb-10">
        <h1 class="text-3xl">Volleybal</h1>
        <button class="bg-[#EEAF00] rounded-md text-2xl">Inschrijven</button>
    </div>
    <p class="text-xl mx-[128px]">Lorem ipsum dolor sit, amet consectetur adipisicing elit. A illo aliquid ipsum eius, praesentium ullam hic voluptatem! Quas perferendis, temporibus praesentium aspernatur, eaque velit quisquam, dolor ad ipsam architecto expedita.</p>
    <div class="flex justify-between w-[80%] mx-[128px] mt-10 mb-10">
        <div class="flex flex-col">
            <h2 class="text-2xl">Locatie</h2>
            <p class="text-xl">{{$activiteit->Locatie_activiteit}}</p>
        </div>
        <div class="flex flex-col">
            <h2 class="text-2xl">Datum</h2>
            <p class="text-xl">12-12-2022</p>
        </div>
        <div class="flex flex-col">
            <h2 class="text-2xl">Tijd</h2>
            <p class="text-xl">19:00 - 21:00</p>
        </div>
        <div class="flex flex-col">
            <h2 class="text-2xl">Kosten</h2>
            <p class="text-xl">€5,-</p>
        </div>
        <div class="flex flex-col">
            <h2 class="text-2xl">Aantal deelmeners</h2>
            <p class="text-xl">6 / 30</p>
        </div>
        <div class="flex flex-col">
            <h2 class="text-2xl">Inclusief eten:</h2>
            <p class="text-xl">Ja</p>
        </div>
    </div>

    @endsection