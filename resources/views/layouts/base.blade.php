<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white text-black font-hanken-grotesk pb-12">
    <div class="px-10">
        <nav class="flex justify-between items-center py-4 mb-12 border-b border-gray/50">
            <div>
                <a href="/">
                    <x-application-logo class="w-12 h-12 fill-current text-clrPrimary" />
                </a>
            </div>

            <div class="space-x-4">
                <x-nav-link href="{{ route('articles.index') }}" :active="request()->routeIs('articles.index')">
                    Início
                </x-nav-link>
                <x-nav-link href="{{ route('about') }}" :active="request()->routeIs('about')">
                    Banners
                </x-nav-link>
            </div>

            <div class="flex gap-4">
                @guest
                    <x-nav-link href="{{ route('login') }}">Login</x-nav-link>
                @endguest
                @auth
                    <x-nav-link href="{{ route('articles.create') }}" :active="request()->routeIs('articles.create')">
                        Post Article
                    </x-nav-link>

                    <x-dropdown.el>
                        <x-slot name="trigger">
                            <button>
                                <x-nav-link>
                                    {{ Auth::user()->name }}
                                </x-nav-link>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown.link :href="route('profile.edit')">Profile</x-dropdown.link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown.button>Logout</x-dropdown.button>
                            </form>
                        </x-slot>
                    </x-dropdown.el>
                @endauth
            </div>
        </nav>

        <main class="max-w-[960px] mx-auto pb-12">
            {{ $slot }}
        </main>
    </div>
</body>

</html>
