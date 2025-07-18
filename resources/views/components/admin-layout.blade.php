<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Majalah Digital</title>
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css"> --}}
    @vite('resources/css/app.css')
    {{-- <link rel="stylesheet" href="{{ asset('build/assets/app-CXUAFoOI.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/app-DHBATib1.css') }}"> --}}
    @stack('head')
</head>

<body class="bg-gray-100 min-h-screen">
    {{ $slot }}
    @stack('scripts')
</body>

</html>
