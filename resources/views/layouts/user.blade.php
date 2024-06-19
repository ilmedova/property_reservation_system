<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Hotel Management System') }}</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/heroicons/1.0.6/outline.min.css" rel="stylesheet">
</head>
<body>

<nav class="bg-gray-100 py-2">
    <div class="px-6 mx-auto">
        <div class="flex justify-between">
            <div class="flex space-x-4">
                <div>
                    <a href="/" class='flex items-center py-4 px-2 text-gray-700'>
                        <svg class="h-6 w-6 mr-1 text-blue-400" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5                    1.428a1 1 0 001.17-1.408l-7-14z" />
                        </svg>
                        <span class='font-bold'>BookMe</span>
                    </a>
                </div>
                <div class="flex items-center space-x-2">
                    <a href="/" class="py-4 px-3 text-gray-700 hover:text-gray-900">Home</a>
                    <a href="/property" class="py-4 px-3 text-gray-700 hover:text-gray-900">Properties</a>
                    <a href="https://ilmedovamahri.dev" class="py-4 px-3 text-gray-700 hover:text-gray-900">About</a>
                    <a href="https://ilmedovamahri.dev" class="py-4 px-3 text-gray-700 hover:text-gray-900">Contact</a>
                </div>
            </div>
            <div class="flex items-center space-x-1">
                <a href="login" class="py-4 px-3 text-gray-700 hover:text-gray-900">Login</a>
                <a href="login" class="py-2 px-3 bg-yellow-400 rounded hover:text-gray-900 hover:bg-yellow-300">Signup</a>
            </div>
        </div>
    </div>
</nav>


<div>
    @yield('content')
</div>

<script>
    document.getElementById('navbar-toggle').addEventListener('click', function () {
        const menu = document.getElementById('navbar-menu');
        menu.classList.toggle('hidden');
    });
</script>
</body>
</html>
