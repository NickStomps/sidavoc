@extends('layout')

@section('content')
<div class="my-10 w-full flex items-center flex-col flex-wrap"> 
    <div class="w-full h-[200px] bg-gray-300 rounded-t-lg mb-10"></div> 
    <div class="flex justify-between w-[80%] mx-[128px] mb-10">
        <h1 class="text-3xl">Volleybal</h1>
        <button class="bg-green-400 border-solid border-green-500 border-2 rounded-md text-2xl">Deelnemen</button>
    </div>
    <p class="text-xl mx-[128px]">Lorem ipsum dolor sit, amet consectetur adipisicing elit. A illo aliquid ipsum eius, praesentium ullam hic voluptatem! Quas perferendis, temporibus praesentium aspernatur, eaque velit quisquam, dolor ad ipsam architecto expedita.</p>
    <div class="flex justify-between w-[80%] mx-[128px] mt-10 mb-10">
        <div class="flex flex-col">
            <h2 class="text-2xl">Locatie</h2>
            <p class="text-xl">Sporthal De Kuil</p>
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
            <h2 class="text-2xl">aantal deelmeners</h2>
            <p class="text-xl">6 / 30</p>
        </div>
    </div>
    <h2 class="flex text-2xl text-green-600">Bij deze activiteit is eten inbegrepen</h2>
    <div class="flex justify-between w-[80%] mx-[128px] mt-10 mb-10">
        <div class="flex flex-col">
            <h2 class="text-2xl">Mensen die meedoen aan de activiteit:</h2>
            <p class="text-xl">Peter</p>
            <p class="text-xl">Pieter</p>
            <p class="text-xl">Klaas</p>
            <p class="text-xl">Natascha</p>
            <p class="text-xl">Bert</p>
            <p class="text-xl">Jan</p>
        </div>
    </div>

    @endsection