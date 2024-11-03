<x-guest-layout>
    <div class="login-container" style="background: linear-gradient(45deg, #000000, #A400B7); color: white; padding: 10px 20px; border-radius: 8px; border: none;">
        
        <!-- Logo Section -->
        <div class="flex justify-center mt-6">
            <img src="https://images.freeimages.com/fic/images/icons/772/token_light/256/task_manager.png" alt="Logo" style="width: 60px; height: 50px">
        </div>

        <!-- Registration Form -->
        <form method="POST" action="{{ route('register') }}" class="mt-4 p-6 max-w-md mx-auto shadow-lg rounded-lg" style="background-color: var(--shadow-color);">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" class="text-white-600 font-semibold" style="color: white;" />
                <x-text-input id="name" class="block mt-1 w-full border-gray-300 rounded-lg" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-600" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" class="text-white-600 font-semibold" style="color: white;" />
                <x-text-input id="email" class="block mt-1 w-full border-gray-300 rounded-lg" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" class="text-white-600 font-semibold" style="color: white;" />
                <x-text-input id="password" class="block mt-1 w-full border-gray-300 rounded-lg" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-white-600 font-semibold" style="color: white;" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full border-gray-300 rounded-lg" type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-600" />
            </div>

            <!-- Login Link and Register Button -->
            <div class="flex items-center justify-between mt-4">
                <a class="underline text-sm text-white-600 hover:text-gray-400 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <!-- Custom Gradient Register Button -->
                <button type="submit" class="ms-3 log" style="background: linear-gradient(45deg, #000000, #A400B7); color: white; border: 2px solid white; padding: 10px 20px; border-radius: 8px;">
                    {{ __('Register') }}
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>
