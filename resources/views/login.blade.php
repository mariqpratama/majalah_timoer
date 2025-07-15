<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-blue-50 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-sm">
        <h2 class="text-2xl font-bold text-blue-700 mb-6 text-center">Login Admin</h2>
        @if (session('error'))
            <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4">{{ session('error') }}</div>
        @endif
        <form method="POST" action="{{ url('login') }}">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-1">Username</label>
                <input type="text" name="username"
                    class="w-full border rounded px-3 py-2 focus:ring-blue-500 focus:border-blue-500" required
                    autofocus>
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-1">Password</label>
                <input type="password" name="password"
                    class="w-full border rounded px-3 py-2 focus:ring-blue-500 focus:border-blue-500" required>
            </div>
            <button type="submit"
                class="w-full py-2 bg-blue-700 text-white rounded hover:bg-blue-800 font-semibold">Login</button>
        </form>
    </div>
</body>

</html>
