<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CulinArt Burger {{ $title ?? '' }}</title>
    <link rel="shortcut icon" href="/image/logo.ico" type="image/x-icon">
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    @livewireStyles
</head>

<body class="bg-cover bg-center min-h-screen"
    style="background: url(/image/background/Layout.jpg); background-size: 100% 100%">

    <livewire:components.navbar />

    <main class="container mx-w-6xl mx-auto py-4">
        <div class="flex flex-col space-y-8">
            {{ $slot ?? '' }}
        </div>
    </main>


    <x-toaster-hub />
    @livewireScripts
</body>

</html>
