<?php

use App\Livewire\Forms\LoginForm;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirect(
            session('url.intended', RouteServiceProvider::HOME),
            navigate: true
        );
    }
}; ?>

<div class="flex flex-col items-center justify-center px-6 pt-8 mx-auto md:h-screen pt:mt-0 dark:bg-gray-900">
    <a href="/" class="flex items-center justify-center mb-8 text-2xl font-semibold lg:mb-10 dark:text-white">
        <img src="{{ Vite::asset('resources/images/sitorik.png') }}" alt="Sitorik Logo" class="mr-4 h-11">
    </a>
    <!-- Card -->
    <div class="w-full max-w-xl p-6 space-y-8 sm:p-8 bg-white rounded-lg shadow dark:bg-gray-800">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
            Sign in to SITORIK Admin
        </h2>

        <!-- Session Status -->
        <x-admin.auth-session-status class="mb-4" :status="session('status')" />

        <form class="mt-8 space-y-6" wire:submit="login">
            <div>
                <x-admin.input-label for="email" :value="__('Your email')" />
                <x-admin.text-input wire:model="form.email" id="email" class="block mt-1 w-full" type="email" name="email" placeholder="name@company.com" required autofocus autocomplete="username" />
                <x-admin.input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <div>
                <x-admin.input-label for="password" :value="__('Your password')" />
                <x-admin.text-input wire:model="form.password" id="password" class="block mt-1 w-full" placeholder="••••••••"
                              type="password"
                              name="password"
                              required autocomplete="current-password" />
                <x-admin.input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            <div class="flex items-start">
                <div class="flex items-center h-5">
                    <input wire:model="form.remember" id="remember" aria-describedby="remember" name="remember" type="checkbox" class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:focus:ring-primary-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600">
                </div>
                <div class="ml-3 text-sm">
                    <label for="remember" class="font-medium text-gray-900 dark:text-white">Remember me</label>
                </div>
                <a href="#" class="ml-auto text-sm text-primary-700 hover:underline dark:text-primary-500">Lost Password?</a>
            </div>
            <button type="submit" class="w-full px-5 py-3 text-base font-medium text-center text-white bg-primary-700 rounded-lg hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 sm:w-auto dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Login to your account</button>
            <div class="text-sm font-medium text-gray-500 dark:text-gray-400">
                Not registered? <a class="text-primary-700 hover:underline dark:text-primary-500">Create account</a>
            </div>
        </form>
    </div>
</div>
