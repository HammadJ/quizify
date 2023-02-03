<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet">
    <title>Document</title>
    <style>
    
        body {
            font-family: 'Varela Round', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #c1c0f7;
        }
    </style>
</head>
<body>
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

        @include('partials/_navbar')
        {{-- @include('layouts/navigation') --}}
        
        
        <div>
            @yield('contents')
        </div>


</body>
</html>