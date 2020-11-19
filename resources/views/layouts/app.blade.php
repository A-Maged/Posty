<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Laravel App</title>

    <link rel="stylesheet"
          href="{{ asset('css/app.css') }}">
</head>

<body class="bg-gray-300 ">
    <nav class="mb-6 w-full bg-white">
        <div class="max-w-screen-lg mx-auto p-3 flex justify-between flex-wrap">
            <ul class="flex items-center">
                <li class="p-3">
                    <a href="/">Home</a>
                </li>
                <li class="p-3">
                    <a href="{{ route('posts') }}">Posts</a>
                </li>
            </ul>

            <ul class="flex items-center">
                @auth
                    <li class="p-3 capitalize">
                        <a href="">{{ auth()->user()->name }}</a>
                    </li>

                    <li class="p-3">
                        <form action="{{ route('logout') }}"
                              method="POST">
                            @csrf

                            <button class="capitalize">logout</button>
                        </form>
                    </li>
                @endauth

                @guest
                    <li class="p-3">
                        <a href="{{ route('login') }}"
                           class="capitalize">login</a>
                    </li>

                    <li class="p-3">
                        <a href="{{ route('register') }}"
                           class="capitalize">register</a>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>

    <div class="max-w-screen-lg mx-auto p-6 pt-0">
        @yield('content')
    </div>

</body>

</html>
