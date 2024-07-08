<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f3f4f6;
        }
        .welcome-container {
            text-align: center;
        }
        .welcome-image {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        <img src="{{ asset('img/welcome_image.png') }}" alt="Welcome Image" class="welcome-image">
        @if (Route::has('login'))
            <nav class="flex justify-center">
                @auth
                    <a
                        href="{{ url('/dashboard') }}"
                        class="rounded-md px-5 py-3 bg-blue-600 text-white ring-1 ring-transparent transition hover:bg-blue-700 focus:outline-none focus-visible:ring-blue-800 dark:bg-blue-800 dark:hover:bg-blue-900 dark:focus-visible:ring-blue-900"
                    >
                        Dashboard
                    </a>
                @else
                    <a
                        href="{{ route('login') }}"
                        class="rounded-md px-5 py-3 bg-blue-600 text-white ring-1 ring-transparent transition hover:bg-blue-700 focus:outline-none focus-visible:ring-blue-800 dark:bg-blue-800 dark:hover:bg-blue-900 dark:focus-visible:ring-blue-900"
                    >
                        Log in
                    </a>
                @endauth
            </nav>
        @endif
    </div>
</body>
</html>
