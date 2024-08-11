<x-layout>
    <h1 class="title">Register a new account</h1>
    <div class="max-w-screen-sm mx-auto card">
        <form action="{{ route('register') }}" method="post" x-data="formSubmit" @submit.prevent="submit">
            @csrf
            {{-- Username --}}
            <div class="mb-4">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="input @error('username') ring-red-500 @enderror" value="{{ old('username') }}">
                @error('username')
                    <p class="error">
                        {{ $message }}
                    </p>
                @enderror
            </div>
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
            {{-- Confirm Password --}}
            <div class="mb-4">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="input @error('password') ring-red-500 @enderror">

            </div>
            {{-- Submit --}}
            <div class="mb-4">
                <button x-ref="btn" type="submit" class="btn">Register</button>
            </div>
        </form>
    </div>
</x-layout>
