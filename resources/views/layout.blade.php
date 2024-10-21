<?php
    use Illuminate\Support\Facades\Auth;
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sidavoc</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="w-full">
        <div class="bg-[#EEAF00]">
            <div class="flex justify-center w-full"> 
                <ul class="flex justify-between w-[75%] my-3">
                    <li class="hover:underline underline-offset-2">
                        <a href="/">
                            home
                        </a>
                    </li>
                    @auth
                        <li class="hover:underline underline-offset-2">
                            <a href="/overzicht">
                                overzicht
                            </a>
                        </li>
                    @endauth   
                    @auth
                        @if(Auth::user()->roleId == 2)           
                            <li class="hover:underline underline-offset-2">
                                <a href="/activiteitBeheer">toevoegen</a>
                            </li>     
                            <li class="hover:underline underline-offset-2">
                                <a href="/register">gebruiker toevoegen</a>
                            </li>
                        @endif
                    @endauth
                    <li>
                        @if(Auth::guest())
                            <a href="/login">
                                <i class="fa-solid fa-user"></i> 
                                Login
                            </a>   
                        @endif
                    </li>
                        @auth
                            Welkom {{Auth::user()->name }}
                        @endauth
                        @auth
                            <li>
                                <a href="/logout" >
                                    <i class="fa-solid fa-user-slash"></i> Logout                                 
                                </a>
                            </li>
                        @endauth
                    </li>
                </ul>
            </div>
        </div>            
        @yield('content')
    </div>
</body>
</html>