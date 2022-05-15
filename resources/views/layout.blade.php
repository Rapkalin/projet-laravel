<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdn.tailwindcss.com"></script>

        <title>{{page_title($title ?? null)}}</title>

    </head>
    <body class="flex flex-col items-center justify-between min-h-screen py-5 mb-4">

        <main role="'main" class="flex flex-col items-center ">
            <div>
                <button class="bg-yellow-500
                    hover:bg-yellow-700
                    text-black
                    font-bold
                    py-2 px-4
                    rounded"><a href="/">back home</a></button>
                @yield('content')
            </div>
        </main>

        @include('partials._footer')
    </body>
</html>
