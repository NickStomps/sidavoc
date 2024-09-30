<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Actievadus</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="w-full">
            <div class="bg-[#EEAF00]">
             <div class="flex justify-center w-full"> 
                 <ul class="flex justify-between w-[50%] my-3">
                     <li>
                        <a href="/">
                            home
                        </a>
                     </li> 
                     <li>
                        <a id="account">
                            <i class="fa-solid fa-user"></i>    
                            @auth
                            {{Auth::user()->name }}
                            @endauth
                        </a>
                        <ul class="hidden" id="lijst">
                            @auth
                            <li>
                                <a href="/logout">
                                    uitloggen
                                </a>
                            </li>
                            @endauth
                            @auth
                                <li>
                                    <a href="/account">
                                        account
                                    </a>
                                </li>
                            @else
                                <li>
                                    <a href="/account">
                                        login
                                    </a>
                                </li>
                            @endauth
                        </ul>
                     </li> 
                 </ul>
             </div>
            </div>
        @yield('content')
    </div>
    <script>
        var lijst = document.getElementById("lijst");
        var account = document.getElementById("account")

        account.onclick = function() {
             lijst.classList.toggle('hidden');
        }
console.log("test")
    </script>
</body>
</html>