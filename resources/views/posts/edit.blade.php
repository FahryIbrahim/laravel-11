<x-layout>
    <a href="{{route('dashboard')}}" class="block mb-2 text-xs text-blue-500">&larr; Go back to your dashboard</a>
    <div class="card">

        {{-- Update Post Form --}}
        <h2 class="mb-4 font-bold">Update your post</h2>
        {{-- Session Messages --}}

        <form action="{{route('posts.update', $post)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            {{-- Post Title --}}
            <div class="mb-4">
                <label for="title">Post Title</label>
                <input type="text" name="title" id="title" class="input @error('title') ring-red-500 @enderror" value="{{ $post->title }}">
                @error('title')
                <p class="error"> {{$message}} </p>
                @enderror
            </div>
            {{-- Post Body --}}
            <div class="mb-4">
                <label for="body">Post Content</label>
                <textarea name="body" rows="5" id="body" class="input @error('body') ring-red-500 @enderror">{{ $post->body }}</textarea>
                @error('body')
                <p class="error"> {{$message}} </p>
                @enderror
            </div>
            {{-- Current Cover --}}
            @if ($post->image)
            <div class="object-cover w-1/4 h-64 mb-4 overflow-hidden rounded-md">
                <label for="">Current cover photo</label>
                <img src="{{asset('storage/'.$post->image)}}" alt="" srcset="">
            </div>
            @endif
            {{-- Post Image --}}
            <div class="mb-4">
                <label for="image">Cover Photo</label>
                <input type="file" name="image" id="image">
                @error('image')
                <p class="error"> {{$message}} </p>
                @enderror
            </div>
            {{-- Submit Button --}}
            <button type="submit" class="btn">Update</button>
        </form>
    </div>
    </x-layout>
