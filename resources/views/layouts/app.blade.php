<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Document</title>

    <link rel="stylesheet"
          href="{{ asset('css/app.css') }}">
</head>

<body class="bg-gray-300 ">
    <nav class="p-6 bg-white flex justify-between mb-6">
        <ul class="flex items-center">
            <li class="p-3">
                <a href="/">Home</a>
            </li>
            <li class="p-3">
                <a href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            <li class="p-3">
                <a href="{{ route('posts') }}">Posts</a>
            </li>
        </ul>

        <ul class="flex items-center">
            @auth
                <li class="p-3">
                    <a href="">{{ auth()->user()->name }}</a>
                </li>

                <li class="p-3">
                    <form action="{{ route('logout') }}"
                          method="POST">
                        @csrf

                        <button href="">Logout</button>
                    </form>
                </li>
            @endauth

            @guest
                <li class="p-3">
                    <a href="{{ route('login') }}">Login</a>
                </li>

                <li class="p-3">
                    <a href="{{ route('register') }}">Register</a>
                </li>
            @endguest
        </ul>

    </nav>
    @yield('content')

</body>

</html>
