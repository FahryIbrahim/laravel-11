@props(['post','full' => false])
{{-- Full Post --}}

<div class="card">
    {{-- Title --}}
    <h2 class="font-bold text-xl">{{$post->title}}</h2>
    {{-- Author and Date --}}
    <div class="text-xs font-light mb-4">
        <span>Posted {{$post->created_at->diffForHumans()}} by</span>
        <a href="{{route('posts.user', $post->user)}}" class="text-blue-500 font-medium">{{$post->user->username}}</a>
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
            <a href="{{route('posts.show', $post)}}" class="text-blue-500 ml-2">Read more &rarr;</a>
        </p>
    </div>
    @endif

    <div class="flex items-center justify-end gap-4 mt-6">
        {{$slot}}
    </div>
</div>
