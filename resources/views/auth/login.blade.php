<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
    @csrf

    <!-- Email Address -->
    <div>
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Password -->
    <div class="mt-4">
        <x-input-label for="password" :value="__('Password')" />
        <x-text-input id="password" class="block mt-1 w-full"
                      type="password"
                      name="password"
                      required autocomplete="current-password" />
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Remember Me + Register + Forgot Password -->
    <div class="flex items-center justify-between mt-4 flex-wrap gap-y-2 font-bold">
    <label for="remember_me" class="inline-flex items-center">
    <input id="remember_me" type="checkbox"
        class="rounded bg-white border-white text-[#64481E] focus:ring-white focus:ring-2"
        name="remember">
    <span class="ms-2 text-sm text-[#DDDDCB]">{{ __('Remember me') }}</span>
    </label>


        <div class="flex items-center space-x-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-[#DDDDCB] hover:text-[#FFFFFF] transition-colors duration-200"
                   href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <a class="underline text-sm text-[#DDDDCB] hover:text-[#FFFFFF] transition-colors duration-200"
               href="{{ route('register') }}">
                {{ __('Register') }}
            </a>
        </div>
    </div>

    <!-- Log in Button Centered -->
    <div class="flex justify-center mt-6">
    <x-primary-button class="bg-[#64481E] text-white hover:bg-[#503A17] font-bold">
        {{ __('Log in') }}
    </x-primary-button>
</div>
</form>

</x-guest-layout>
