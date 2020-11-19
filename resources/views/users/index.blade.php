@extends('layouts.app')

@section('content')
    <div class="flex flex-col justify-center">


        <div class="mb-10">
            <h1 class="text-2xl font-medium mb-1 capitalize">{{ $user->name }}</h1>
            <p>
                Posted {{ $posts->count() }} {{ Str::plural('post', $posts->count()) }}
                and recived {{ $user->receivedLikes->count() }} likes
            </p>
        </div>

        <div class="w-full bg-white p-6 rounded-lg">

            {{-- List All Posts --}}
            @if ($posts->count())
                @foreach ($posts as $post)
                    <x-post :post="$post" />
                @endforeach

                {{-- Pagination --}}
                {{ $posts->links() }}
            @else
                <div>no posts</div>
            @endif
        </div>
    </div>
@endsection
