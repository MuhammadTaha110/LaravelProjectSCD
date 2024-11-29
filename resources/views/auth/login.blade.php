<x-guest-layout>
<div class="login-container" style="background: linear-gradient(45deg, #000000, #A400B7); color: white; padding: 10px 20px; border-radius: 8px; border: none;">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4 " :status="session('status')" />

    <div class="flex justify-center mt-6">
        <img src="https://images.freeimages.com/fic/images/icons/772/token_light/256/task_manager.png" alt="Logo" style="width: 60px; height:50px">
    </div>

    <form method="POST" action="{{ route('login') }}" class="mt-4 p-6 max-w-md mx-auto shadow-lg rounded-lg" style="background-color: var(--shadow-color); color:black">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-white-600 font-semibold" style="color: white;"/>
            <x-text-input id="email" class="block mt-1 w-full border-gray-300 rounded-lg" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" class="text-white-600 font-semibold" style="color: white;" />
            <x-text-input id="password" class="block mt-1 w-full border-gray-300 rounded-lg" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center text-white" >
                <input id="remember_me" type="checkbox" class="rounded border-gray-300   shadow-sm " name="remember" >
                <span class="ms-2 text-sm text-white-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <!-- Forgot Password and Login Button -->
        <div class="flex items-center justify-between mt-4">
            @if (Route::has('password.request'))
                <a class="text-sm text-white-600 text-white hover:text-gray-400 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <!-- Custom Gradient Login Button -->
            <button type="submit" class="ms-3 log" style="background: linear-gradient(45deg, #000000, #A400B7); color: white; border: 2px solid white; padding: 10px 20px; border-radius: 8px; ">
    Log in
</button>

        </div>
    </form>
</div>
</x-guest-layout>
