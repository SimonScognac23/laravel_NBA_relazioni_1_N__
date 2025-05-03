<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css', 'resources/js/app.js')



    {{-- Collegamento per il pre-caricamento dei font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com"> {{-- Preconnessione a fonts.googleapis.com per una connessione più veloce --}}
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> {{-- Preconnessione per la parte del font statico --}}
    
    {{-- Collegamento ai font Montserrat, Poppins e Roboto da Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

</head>
<body>

<x-navbar/>

{{$slot}}


</body>
</html>