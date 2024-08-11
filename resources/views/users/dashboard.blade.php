<x-layout>
    <h1 class="title">Welcome {{auth()->user()->username}} you have {{$posts->total()}} posts</h1>
    {{-- Create Post Form --}}
    <div class="mb-4 card">
        <h2 class="mb-4 font-bold">Create a new post</h2>


        {{-- Session Messages --}}
        @if (session('success'))
            <x-flashMsg msg="{{session('success')}}"/>
        @elseif(session('delete'))
            <x-flashMsg msg="{{session('delete')}}" bg="bg-red-500"/>
        @endif

        <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
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
            {{-- Post Image --}}
            <div class="mb-4">
                <label for="image">Cover Photo</label>
                <input type="file" name="image" id="image">
                @error('image')
                <p class="error"> {{$message}} </p>
                @enderror
            </div>
            {{-- Submit Button --}}
            <button type="submit" class="btn">Create Post</button>
        </form>
    </div>

    {{-- User Posts --}}
    <h2 class="mb-4 font-bold">Your Posts</h2>
    <div class="grid grid-cols-2 gap-6">

        @foreach ($posts as $post)
        <x-postCard :post="$post">

            {{-- Update Post --}}
            <a href="{{route('posts.edit', $post)}}" class="px-2 py-1 text-xs text-white bg-green-500 rounded-md">Update</a>

            {{-- Delete Post --}}
            <form action="{{route('posts.destroy', $post)}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-2 py-1 text-xs text-white bg-red-500 rounded-md">Delete</button>
            </form>
        </x-postCard>
        @endforeach
    </div>

    <div class="">
        {{$posts->links()}}
    </div>
</x-layout>
