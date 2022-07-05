<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">

                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{asset('img/logo.png')}}" class="w-36" alt="">
                    </a>
                </div>

                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <a href="{{route('dashboard')}}" class="pb-1 mt-1 cursor-pointer inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 transition duration-150 ease-in-out
                    @if(request()->routeIs('dashboard'))
                        border-neutral-400 text-gray-900 focus:outline-none focus:border-neutral-700
                    @else
                        border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300
                    @endif">
                        {{ __('messages.dashboard') }}
                    </a>
                </div>

                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <a href="{{route('reports.show')}}" class="pb-1 mt-1 cursor-pointer inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 transition duration-150 ease-in-out
                    @if(request()->routeIs('reports.show'))
                        border-neutral-400 text-gray-900 focus:outline-none focus:border-neutral-700
                    @else
                        border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300
                    @endif">
                        {{__('messages.pages.subjects')}}
                    </a>
                </div>

                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <a href="{{route('companies.show')}}" class="pb-1 mt-1 cursor-pointer inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 transition duration-150 ease-in-out
                    @if(request()->routeIs('companies.show'))
                        border-neutral-400 text-gray-900 focus:outline-none focus:border-neutral-700
                    @else
                        border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300
                    @endif">
                        {{ __('messages.pages.companies') }}
                    </a>
                </div>

            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="border-b-2">
                            @foreach (Config::get('languages') as $lang => $language)
                                @if ($lang != App::getLocale())
                                    <a class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out" href="{{route('lang.switch', $lang)}}" >
                                        {{$language}}
                                    </a>
                                @endif
                            @endforeach
                        </div>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out" href="{{route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </a>
                        </form>
                    </x-slot>

                </x-dropdown>
            </div>

            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <a href="{{route('dashboard')}}" class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium focus:outline-none transition duration-150 ease-in-out
                @if(request()->routeIs('dashboard'))
                    border-neutral-400  text-neutral-700 bg-neutral-50  focus:text-neutral-800 focus:bg-neutral-100 focus:border-neutral-700
                @else
                    border-transparent text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300
                @endif">
                {{ __('Dashboard') }}
            </a>


            <a href="{{route('reports.show')}}" class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium focus:outline-none transition duration-150 ease-in-out
                @if(request()->routeIs('reports.show'))
                    border-neutral-400  text-neutral-700 bg-neutral-50  focus:text-neutral-800 focus:bg-neutral-100 focus:border-neutral-700
                @else
                    border-transparent text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300
                @endif">
                {{ __('messages.pages.subjects') }}
            </a>

            <a href="{{route('companies.show')}}" class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium focus:outline-none transition duration-150 ease-in-out
                @if(request()->routeIs('companies.show'))
                    border-neutral-400  text-neutral-700 bg-neutral-50  focus:text-neutral-800 focus:bg-neutral-100 focus:border-neutral-700
                @else
                    border-transparent text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300
                @endif">
                {{ __('messages.pages.companies') }}
            </a>
        </div>

        <div class="border-y-2">
            @foreach (Config::get('languages') as $lang => $language)
                @if ($lang == App::getLocale())
                    <a class="block pl-3 pr-4 py-2 border-l-4 border-neutral-400 text-sm font-medium text-neutral-700 bg-neutral-50 focus:outline-none focus:text-neutral-800 focus:bg-neutral-100 focus:border-neutral-700 transition duration-150 ease-in-out">
                        {{$language}}
                    </a>
                @endif
                @if ($lang != App::getLocale())
                    <a class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-sm font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out" href="{{route('lang.switch', $lang)}}" >
                        {{$language}}
                    </a>
                @endif
            @endforeach
        </div>

        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out" href="{{route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </a>
                </form>
            </div>
        </div>
    </div>
</nav>
