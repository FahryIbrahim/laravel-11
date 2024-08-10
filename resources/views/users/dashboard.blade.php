<x-layout>
    <h1 class="title">Hello {{auth()->user()->username}}</h1>
    {{-- Create Post Form --}}
    <div class="card mb-4">
        <h2 class="font-bold mb-4">Create a new post</h2>


        {{-- Session Messages --}}
        @if (session('success'))
        <div class="mb-2">
            <x-flashMsg msg="{{session('success')}}"/>
        </div>
        @endif

        <form action="{{route('posts.store')}}" method="post">
            @csrf
            {{-- Post Title --}}
            <div class="mb-4">
                <label for="title">Post Title</label>
                <input type="text" name="title" id="title" class="input @error('title') ring-red-500 @enderror" value="{{old('title')}}">
                @error('title')
                <p class="error"> {{$message}} </p>
                @enderror
            </div>
            {{-- Post Body --}}
            <div class="mb-4">
                <label for="body">Post Content</label>
                <textarea name="body" rows="5" id="body" class="input @error('body') ring-red-500 @enderror">{{old('body')}}</textarea>
                @error('body')
                <p class="error"> {{$message}} </p>
                @enderror
            </div>
            {{-- Submit Button --}}
            <button type="submit" class="btn">Create Post</button>
        </form>
    </div>

    {{-- User Posts --}}
    <h2 class="font-bold mb-4">Your Posts</h2>
    <div class="grid grid-cols-2 gap-6">

        @foreach ($posts as $post)
        <x-postCard :post="$post"/>
        @endforeach
    </div>

    <div class="">
        {{$posts->links()}}
    </div>
</x-layout>
