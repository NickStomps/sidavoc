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
                        <a href="#">
                            overzicht
                        </a>
                     </li>   
                     <li>
                        <a href="/account">
                            <i class="fa-solid fa-user"></i>
                        </a>
                     </li> 
                 </ul>
             </div>
            </div>
        @yield('content')
    </div>
</body>
</html>