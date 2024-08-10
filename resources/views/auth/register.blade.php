<x-layout>
    <h1 class="title">Register a new account</h1>

    <div class="mx-auto max-w-screen-sm card">
        <form action="{{route('register')}}" method="post">
            @csrf
            <div class="mb-4">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="input">
            </div>
            <div class="mb-4">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="input">
            </div>
            <div class="mb-4">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="input">
            </div>
            <div class="mb-4">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="input">
            </div>
            <div class="mb-4">
                <button type="submit" class="btn">Register</button>
            </div>
        </form>
    </div>
</x-layout>
