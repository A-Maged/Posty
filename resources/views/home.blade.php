@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-full max-w-screen-md bg-white p-6 rounded-lg text-xl">
            <h2 class="text-2xl">Some context for you:</h2>

            <ul class="list-disc pl-5">
                <li>I did this as a refresher on laravel.</li>
                <li>
                    It lead to making a (small) <a href="https://github.com/laravel/laravel/pull/5471">contribution</a>
                    to the framework.
                </li>
                <li>I followed this <a href="https://youtu.be/MFh0Fd7BsjE">crash course</a>.</li>
            </ul>

            <br />
            <iframe class="w-full"
                    height="400"
                    src="https://www.youtube.com/embed/MFh0Fd7BsjE"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
        </div>
    </div>
@endsection
