<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!--Styles Sheets-->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    </style>
</head>

<body class="font-Main">
    <div id="app" class=" flex flex-col items-center ">
        <router-view></router-view>
    </div>
    <script src="/js/app.js"></script>

</body>

</html>