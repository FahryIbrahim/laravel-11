<x-layout>
    <h1 class="title">Login account</h1>
    <div class="mx-auto max-w-screen-sm card">
        <form action="{{ route('login') }}" method="post">
            @csrf
            {{-- Email --}}
            <div class="mb-4">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="input @error('email') ring-red-500 @enderror" value="{{ old('email') }}">
                @error('email')
                    <p class="error">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            {{-- Password --}}
            <div class="mb-4">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="input @error('password') ring-red-500 @enderror">
                @error('password')
                    <p class="error">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            {{-- Remember Me --}}
            <div class="mb-4">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Remember Me</label>
            </div>

            @error('failed')
            <p class="error py-4">
                {{ $message }}
            </p>
            @enderror
            {{-- Submit --}}
            <div class="mb-4">
                <button type="submit" class="btn">Login</button>
            </div>
        </form>
    </div>
</x-layout>
