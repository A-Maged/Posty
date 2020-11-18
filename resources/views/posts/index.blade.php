@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 max-w-4xl p-6 bg-white p-6 rounded-lg">

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


            {{-- List All Posts --}}
            @if ($posts->count())
                @foreach ($posts as $post)
                    <div class="mb-5">
                        <a href=""
                           class="font-bold capitalize">
                            {{ $post->user->name }}
                        </a>

                        <span class="text-gray-600 text-sm">{{ $post->created_at->diffForHumans() }}</span>

                        <div>{{ $post->body }}</div>

                        {{-- Likes & Delete --}}
                        <div class="flex items-center">
                            @auth
                                @if ($post->likedBy(auth()->user()))
                                    {{-- Unlike form --}}
                                    <form action="{{ route('posts.likes', $post) }}"
                                          method="POST"
                                          class="mr-1">
                                        @csrf
                                        @method('DELETE')

                                        <button class="text-blue-500">Unlike</button>
                                    </form>
                                @else
                                    {{-- Like Form --}}
                                    <form action="{{ route('posts.likes', $post) }}"
                                          method="POST"
                                          class="mr-1">
                                        @csrf

                                        <button class="text-blue-500">Like</button>
                                    </form>
                                @endif

                                {{-- Delete Form --}}
                                @can('delete', $post)
                                    <form action="{{ route('posts.destroy', $post) }}"
                                          method="POST"
                                          class="mr-1">
                                        @csrf
                                        @method('DELETE')

                                        <button class="text-blue-500">Delete</button>
                                    </form>
                                @endcan
                            @endauth
                            <span>{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>
                        </div>

                    </div>
                @endforeach

                {{-- Pagination --}}
                {{ $posts->links() }}
            @else
                <div>no posts</div>
            @endif
        </div>
    </div>
@endsection
