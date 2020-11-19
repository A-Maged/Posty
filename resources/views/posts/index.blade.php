@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-full p-6 bg-white p-6 rounded-lg">

            {{-- Session --}}
            @if (session()->has('status'))
                <div class="bg-green-500 p-4 rounded-lg mb-6 text-white text-center">
                    {{ session('status') }}
                </div>
            @endif

            @if (session()->has('error'))
                <div class="bg-red-500 p-4 rounded-lg mb-6 text-white text-center">
                    {{ session('error') }}
                </div>
            @endif

            {{-- New Post Form --}}
            @auth
                <form action="{{ route('posts') }}"
                      method="POST"
                      class="mb-4">

                    @csrf

                    <div class="mb-4">
                        <label for="body"
                               class="sr-only">body</label>

                        <textarea name="body"
                                  id="body"
                                  cols="30"
                                  rows="4"
                                  class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror"
                                  placeholder="Post something!"></textarea>

                        @error('body')
                            <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <button class="bg-blue-500 text-white px-4 py-2 rounded font-medium">Post</button>
                </form>

            @else
                <h2 class="text-3xl text-center m-10 mt-3 text-red-600">Sign in to make a post.</h2>
            @endauth


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
