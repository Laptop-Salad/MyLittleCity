<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased font-sans min-h-screen">
        <main class="flex flex-col items-center justify-center min-h-screen space-y-6">
            <h1 class="text-4xl">My Little City</h1>

            <div class="space-x-2">
                <x-btn class="text-lg" :href="route('register')">Login</x-btn>
                <x-btn class="text-lg" :href="route('login')">Register</x-btn>
            </div>
        </main>
    </body>
</html>
