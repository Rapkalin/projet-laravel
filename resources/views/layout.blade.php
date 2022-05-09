<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdn.tailwindcss.com"></script>

        <title>{{page_title($title ?? null)}}</title>

    </head>
    <body class="flex flex-col items-center justify-between min-h-screen py-5">
        <main role="'main" class="flex flex-col items-center">
            <button><a href="pages/users/index.blade.php">users test</a></button>
            @yield('content')
        </main>

        @include('partials._footer')
    </body>
</html>
