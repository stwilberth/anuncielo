

<x-guest-layout>
    <x-slot name="meta_tags_layout">
        <meta name="description" content="{{ __('Register') }}">
        <title>{{ __('Register') }} | Anúncielo.com</title>
    </x-slot>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $store->name }}
        </h2>
    </x-slot> --}}

<div>
    <form method="POST" action="{{ route('register.store') }}" id="registerForm">
        @csrf
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input  id="name" class="block mt-1 w-full" type="text" name="name" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input  id="email" class="block mt-1 w-full" type="email" name="email" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input  id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input  id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">

            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}" wire:navigate>
                {{ __('Already registered?') }}
            </a>

            <button class="g-recaptcha ml-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                    data-sitekey="6Lc4bKQZAAAAABQjo7NnmrLE8x3D9f1mEaWuiJhf"
                    data-callback='onSubmit'
                    data-action='submit'>Submit</button>

        </div>
    </form>
</div>


<x-slot name="scripts_layout_top">
     <script src="https://www.google.com/recaptcha/api.js"></script>
</x-slot>

<x-slot name="scripts_layout_bottom">
 <script>
   function onSubmit(token) {
     document.getElementById("registerForm").submit();
   }
 </script>
</x-slot>
</x-guest-layout>



