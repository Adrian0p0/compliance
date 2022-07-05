<div class="p-4">
    <div class="group relative">
        <button class="bg-gray-800 text-white px-6 h-10 rounded w-32">{{ __("messages.".Config::get('languages')[App::getLocale()]) }}</button>
        <nav tabindex="0" class="border-2 bg-white invisible rounded w-60 absolute left-0 top-full transition-all opacity-0 group-focus-within:visible group-focus-within:opacity-100 group-focus-within:translate-y-1">
            <ul class="py-1">
                @foreach (Config::get('languages') as $lang => $language)
                    @if ($lang != App::getLocale())
                        <li>
                            <a href="{{ route('lang.switch', $lang) }}" class="block px-4 py-2 hover:bg-gray-100">
                                {{__("messages.".$language)}}
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </nav>
    </div>
</div>
