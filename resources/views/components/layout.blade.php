<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="/img/logo.png" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    {{-- <link rel="stylesheet" href="{{ asset('build/assets/app-CXUAFoOI.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/app-DHBATib1.css') }}"> --}}
    <meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <link href="{{ asset('style/css/style.css') }}" rel="stylesheet" type="text/css">
    <!-- Flipbook StyleSheet -->
    <link href="{{ asset('flipbook/dflip/css/dflip.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Icons Stylesheet -->
    <link href="{{ asset('flipbook/dflip/css/themify-icons.min.css') }}" rel="stylesheet" type="text/css">
    <!-- CSS DearFlip -->
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/dflip@1.5.15/css/dflip.min.css"> --}}
    <title>Timoer</title>
</head>


<body class="overflow-y-scroll min-h-screen flex flex-col bg-gray-50 dark:bg-gray-900">
    <x-navbar></x-navbar>
    <main class="flex-grow bg-white">
        <div class="max-w-screen-xl mx-auto p-6">
            <!-- Konten di sini -->
            {{ $slot }}
        </div>
    </main>

    <!-- Footer -->
    <footer
        class="bottom-0 left-0 z-20 w-full p-2 bg-white border-t border-gray-200 shadow-sm md:flex md:items-center md:justify-between md:p-6 dark:bg-gray-800 dark:border-gray-600">
        <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">
            © 2025 <a href="https://kominfo.beltim.go.id/" class="hover:underline">Dinas Komunikasi, Informatika,
                Statistika dan Persandian</a>.
            Hak Cipta dilindungi Undang-undang..
        </span>
        <ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-500 dark:text-gray-400 sm:mt-0">
            <li>
                <a href="https://www.beltim.go.id/" class="hover:underline me-4 md:me-6">Lawang Beltim</a>
            </li>
            <li>
                <a href="https://portal.beltim.go.id/" class="hover:underline me-4 md:me-6">Pemda Belitung
                    Timur</a>
            </li>
        </ul>
    </footer>
</body>

<script src="{{ asset('build/assets/app-DYjYUjHp.js') }}" defer></script>
<!-- JS DearFlip -->
{{-- <script src="https://cdn.jsdelivr.net/npm/dflip@1.5.15/js/dflip.min.js"></script> --}}
<script src="{{ asset('flipbook/flipbook.js') }}"></script>
<script src="{{ asset('flipbook/dflip/js/libs/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('style/js/script.js') }}" type="text/javascript"></script>
<!-- Flipbook main Js file -->
<script src="{{ asset('flipbook/dflip/js/dflip.min.js') }}" type="text/javascript"></script>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>


</html>
