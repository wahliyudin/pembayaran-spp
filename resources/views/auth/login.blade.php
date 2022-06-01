<x-guest-layout>

    <div class="flex justify-center items-center h-screen">
        <div class="flex flex-col shadow bg-white w-1/4">
            <div class="flex justify-center py-4">
                <img src="{{ asset('assets/images/user-default.png') }}" class="w-32 h-32 rounded-full object-cover"
                    alt="">
            </div>
            <div class="bg-gray-700 py-4 flex justify-center">
                <span class="text-2xl text-white font-semibold uppercase">Login SPP</span>
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="flex flex-col py-6 px-4 space-y-4">
                    <div class="flex rounded border border-gray-700 overflow-hidden bg-teal-500">
                        <div class="bg-gray-700 flex py-2 px-2"><i class='bx bxs-envelope text-white text-2xl'></i></div>

                        <input type="email" class="flex-grow rounded-r border-none" placeholder="Email" name="email"
                            :value="old('email')" required autofocus>
                    </div>
                    <div class="flex rounded border border-gray-700 overflow-hidden bg-teal-500">
                        <div class="bg-gray-700 flex py-2 px-2"><i class='bx bxs-lock text-white text-2xl'></i></div>

                        <input type="password" class="flex-grow rounded-r border-none" placeholder="Password"
                            name="password" required autocomplete="current-password">
                    </div>

                    <div class="flex justify-end items-center space-x-2">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                        <button type="submit"
                            class="text-white px-4 py-2 bg-gray-700 rounded flex items-center uppercase text-sm font-semibold active:bg-gray-800 hover:bg-gray-800"><i
                                class='bx bx-shuffle mr-2 text-xl'></i> Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                    autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card> --}}
</x-guest-layout>
