<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" class="text-sky-500" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full focus:border-indigo-500 focus:ring-sky-500" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" class="text-sky-500" :value="__('Senha')" />

            <x-text-input id="password" class="block mt-1 w-full focus:border-indigo-500 focus:ring-sky-500"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-sky-600 shadow-sm focus:ring-sky-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Me lembre') }}</span>
            </label>
        </div>
        <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 text-gray-600 hover:text-sky-500 transition duration-700 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ml-3" href="/register">
                    {{ __('Não tem uma conta?') }}
                </a>
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 text-gray-600 hover:text-sky-500 transition duration-700 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ml-3" href="{{ route('password.request') }}">
                    {{ __('Esqueceu a senha?') }}
                </a>
            @endif
            <x-primary-button class="ml-3 rounded-full bg-sky-500 hover:bg-gray-500">
                {{ __('Entrar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
