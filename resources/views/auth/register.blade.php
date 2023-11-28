<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" class="text-sky-500" :value="__('Nome')" />
            <x-text-input id="name" class="block mt-1 w-full focus:border-indigo-500 focus:ring-sky-500" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" class="text-sky-500" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full focus:border-indigo-500 focus:ring-sky-500" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" class="text-sky-500" :value="__('Senha')" />

            <x-text-input id="password" class="block mt-1 w-full focus:border-indigo-500 focus:ring-sky-500"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" class="text-sky-500" :value="__('Confirme a sua senha')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full focus:border-indigo-500 focus:ring-sky-500"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 text-gray-600 hover:text-sky-500 transition duration-700 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="/">
                    {{ __('Voltar pra home') }}
                </a>
            <a class="ml-3 underline text-sm text-gray-600 text-gray-600 hover:text-sky-500 transition duration-700 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Já tem uma conta?') }}
            </a>

            <x-primary-button class="ml-3 rounded-full bg-sky-500 hover:bg-gray-500">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
