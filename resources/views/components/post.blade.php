@props(['post' => $post])

<div class="mb-6">
    <a href="{{ route('users.posts', $post->user) }}"
       class="font-bold capitalize mr-1 hover:underline">
        {{ $post->user->name }}
    </a>

    <a href="{{ route('posts.show', $post) }}"
       class="text-gray-600 text-sm underline">
        {{ $post->created_at->diffForHumans() }}
    </a>

    <div class="mt-2">{{ $post->body }}</div>

    {{-- Likes & Delete --}}
    <div class="flex items-center mt-2">
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
