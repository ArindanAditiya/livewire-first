<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? config('app.name') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

        @livewireStyles
    </head>
    <body>
        <div class="w-11/12 max-w-7xl mx-auto my-10 md:my-16">
            <div class="flex flex-col lg:flex-row gap-8 lg:gap-10">
                {{-- form --}}
                @livewire("user-reqister-form")
                
                {{-- list --}}
                @livewire("user-list")
                
            </div>

        </div>

        <script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>
    </body>
</html>
