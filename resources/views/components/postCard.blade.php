@props(['post','full' => false])
{{-- Full Post --}}

<div class="card">
    {{-- Cover photo --}}
    <div>
        @if ($post->image)

        <img src="{{asset('storage/'.$post->image)}}" alt="" srcset="">
        @else
        <img src="{{asset('storage/posts_images/default.jpg')}}" alt="" srcset="">

        @endif
    </div>
    {{-- Title --}}
    <h2 class="text-xl font-bold">{{$post->title}}</h2>
    {{-- Author and Date --}}
    <div class="mb-4 text-xs font-light">
        <span>Posted {{$post->created_at->diffForHumans()}} by</span>
        <a href="{{route('posts.user', $post->user)}}" class="font-medium text-blue-500">{{$post->user->username}}</a>
    </div>
    {{-- Body --}}
    @if ($full)
    <div class="text-sm">
        <p>
            <span>{{($post->body)}}</span>
        </p>
    </div>

    @else

    <div class="text-sm">
        <p>
            <span>{{Str::words($post->body, 15)}}</span>
            <a href="{{route('posts.show', $post)}}" class="ml-2 text-blue-500">Read more &rarr;</a>
        </p>
    </div>
    @endif

    <div class="flex items-center justify-end gap-4 mt-6">
        {{$slot}}
    </div>
</div>
