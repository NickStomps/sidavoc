@extends('layout')

@section('content')
<div class="w-full flex items-center flex-col flex-wrap">
    <div class="w-[80%] mt-3 h-[19.4rem] bg-gray-300 rounded-lg mb-10">
        <img src="{{ $activiteit->image_path ? Vite::asset($activiteit->image_path) : Vite::asset('/resources/images/logo_covadis_2016.png') }}" alt="Activiteit Image" class="w-full rounded-lg h-full {{ $activiteit->image_path ? '' : 'object-scale-down' }}">
    </div>

    <div class="flex justify-between w-[80%] mx-[128px] mb-10">
        <h1 class="text-3xl">{{$activiteit->naam_activiteit}}</h1>
        <div class="flex space-x-2">
            <!-- kijken of de rol van de gebruiker gelijk is aan de id van de admin rol -->
            @auth
                @if ((Auth::user()->roleId == 2))
                    <div onclick="openDeleteModal()" class="bg-[#EEAF00] rounded-md text-2xl cursor-pointer flex items-center justify-center px-4 py-2">Verwijderen</div>
                    <a href="/activiteitBeheerEdit/{{$activiteit->id}}" class="bg-[#EEAF00] rounded-md text-2xl flex items-center justify-center px-4 py-2">Aanpassen</a>
                    <a href="/deelnemers/{{$activiteit->id}}">
                        <div class="bg-[#EEAF00] rounded-md text-2xl flex items-center justify-center px-4 py-2">Deelnemers</div>
                    </a>
                @endif
            @endauth
        </div>
        @if($isIngeschreven)
        <form action="{{ route('uitschrijven') }}" method="POST">
            @csrf
            <input type="hidden" name="activiteit_id" value="{{ $activiteit->id }}">
            <button type="submit" class="bg-red-600 p-2 rounded-md text-2xl cursor-pointer">Uitschrijven</button>
        </form>
        @else
        @if($activiteit->deelnemers < $activiteit->maximaal_deelnemers)
            @if(auth()->check())
            <!-- Als de gebruiker is ingelogd, toon knop voor inschrijving zonder email -->
            <div class="bg-[#EEAF00] p-2 rounded-md text-2xl cursor-pointer" onclick="openAuthModal()">Inschrijven</div>
            @else
            <!-- Als de gebruiker niet is ingelogd, vraag om email en naam -->
            <div class="bg-[#EEAF00] p-2 rounded-md text-2xl cursor-pointer" onclick="openModal()">Inschrijven</div>
            @endif
            @else
            <p class="text-2xl text-red-600">Deze activiteit is vol</p>
            @endif
            @endif
    </div>

    <p class="text-xl w-[80%] mx-[128px]">
        @if ($activiteit->Details_activiteit == null)
        Deze activiteit heeft geen beschrijving.
        @else
        {{ $activiteit->Details_activiteit }}
        @endif
    </p>

    <div class="flex justify-between w-[80%] mx-[128px] mt-10 mb-10">
        <div class="flex flex-col">
            <h2 class="text-2xl">Locatie:</h2>
            <p class="text-xl">{{ $activiteit->Locatie_activiteit }}</p>
        </div>
        <div class="flex flex-col">
            <h2 class="text-2xl">Begint op: </h2>
            <p class="text-xl">{{ \Carbon\Carbon::parse($activiteit->Begin_activiteit)->format('d-m-Y H:i') }}</p>
        </div>
        <div class="flex flex-col">
            <h2 class="text-2xl">Eindigt op:</h2>
            <p class="text-xl">{{ \Carbon\Carbon::parse($activiteit->Eind_activiteit)->format('d-m-Y H:i') }}</p>
        </div>
        @if ($activiteit->Kosten != null)
        <div class="flex flex-col">
            <h2 class="text-2xl">Kosten:</h2>
            <p class="text-xl">€{{ $activiteit->Kosten }},-</p>
        </div>
        @endif
        <div class="flex flex-col">
            <h2 class="text-2xl">Aantal deelnemers:</h2>
            <p class="text-xl">{{ $activiteit->deelnemers }}/ {{ $activiteit->maximaal_deelnemers }}</p>
        </div>
        <div class="flex flex-col">
            <h2 class="text-2xl">Inclusief eten:</h2>
            <p class="text-xl">
                @if ($activiteit->eten_inclusief == 1)
                Ja
                @else
                Nee
                @endif
            </p>
        </div>
    </div>
</div>

<!-- Pop-up voor als je niet bent ingelogd maar toch wil inschrijven door middel van email -->
<div id="emailModal" class="fixed top-0 left-0 w-full h-full bg-gray-900 bg-opacity-50 justify-center items-center hidden">
    <div class="bg-white p-6 rounded-lg w-[400px] relative">
        <h2 class="text-2xl mb-4">Vul je emailadres in</h2>
        <form action="/inschrijven/save" method="POST">
            @csrf
            <input type="hidden" name="activiteit_id" value="{{ $activiteit->id }}">
            <input type="email" name="email" class="border border-gray-300 p-2 w-full rounded mb-4" placeholder="Emailadres" required>
            <input type="text" name="naam" class="border border-gray-300 p-2 w-full rounded mb-4" placeholder="Naam" required>
            <textarea name="opmerking" rows="4" cols="45" placeholder="Geef hier een opmerking..." class="rounded border border-black bg-slate-100 resize-none"></textarea>
            <button type="submit" class="bg-[#EEAF00] p-2 w-full rounded-md text-xl">Verzenden</button>
        </form>
        <button class="mt-4 text-red-600" onclick="closeModal()">Sluiten</button>
    </div>
</div>

<!-- Pop-up voor als je bent ingelogd en een opmerking kan toevoegen -->
<div id="authModal" class="fixed top-0 left-0 w-full h-full bg-gray-900 bg-opacity-50 justify-center items-center hidden">
    <div class="bg-white p-6 rounded-lg w-[400px] relative">
        <h2 class="text-2xl mb-4">Vul een opmerking in</h2>
        <form action="/inschrijven/save" method="POST">
            @csrf
            <input type="hidden" name="activiteit_id" value="{{ $activiteit->id }}">
            <textarea name="opmerking" rows="4" cols="45" placeholder="Geef hier een opmerking..." class="rounded border border-black bg-slate-100 resize-none"></textarea>
            <button type="submit" class="bg-[#EEAF00] p-2 w-full rounded-md text-xl">Verzenden</button>
        </form>
        <button class="mt-4 text-red-600" onclick="closeAuthModal()">Sluiten</button>
    </div>
</div>
<!-- Pop-up voor bevestigen van verwijderen -->
<div id="deleteModal" class="fixed top-0 left-0 w-full h-full bg-gray-900 bg-opacity-50 justify-center items-center hidden">
    <div class="bg-white p-6 rounded-lg w-[400px] relative">
        <h2 class="text-2xl mb-4">Weet je zeker dat je deze activiteit wilt verwijderen?</h2>
        <form id="delete-form" action="{{ route('activiteitBeheer.destroy', $activiteit->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-[#EEAF00] p-2 w-full rounded-md text-xl text-white">Bevestigen</button>
        </form>
        <button class="mt-4 text-block-300" onclick="closeDeleteModal()">Annuleren</button>
    </div>
</div>


<script>
    function openDeleteModal(){
        document.getElementById('deleteModal').classList.remove('hidden');
        document.getElementById('deleteModal').classList.add('flex');
    }
    function closeDeleteModal(){
        document.getElementById('deleteModal').classList.add('hidden');
        document.getElementById('deleteModal').classList.remove('flex');
    }
    document.getElementById('deleteModal').addEventListener('click', function(event) {
        if (event.target === this) {
            closeDeleteModal();
        }
    });
    function openModal() {
        document.getElementById('emailModal').classList.remove('hidden');
        document.getElementById('emailModal').classList.add('flex');
    }

    function closeModal() {
        document.getElementById('emailModal').classList.add('hidden');
        document.getElementById('emailModal').classList.remove('flex');
    }

    // Close the modal when clicking outside of it
    document.getElementById('emailModal').addEventListener('click', function(event) {
        if (event.target === this) {
            closeModal();
        }
    });

    function openAuthModal() {
        document.getElementById('authModal').classList.remove('hidden');
        document.getElementById('authModal').classList.add('flex');
    }

    function closeAuthModal() {
        document.getElementById('authModal').classList.add('hidden');
        document.getElementById('authModal').classList.remove('flex');
    }
    document.getElementById('authModal').addEventListener('click', function(event) {
        if (event.target === this) {
            closeAuthModal();
        }
    });
</script>
@endsection