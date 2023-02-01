{{-- @if ($navigation)
    <div class="flex justify-between items-center lg:py-3 lg:justify-start lg:space-x-10">
        <div class="hidden lg:flex-1 lg:flex lg:items-center lg:justify-between">
            <nav class="flex space-x-10 w-full justify-between">
                @foreach ($navigation as $item)
                    @if ($item->children)
                        <div x-data="{ open: false }" class="relative">
                            <a @click="open = true" href="#"
                                class="text-lg text-gray-500 group rounded-md inline-flex items-center font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 {{ $item->classes ?? '' }} {{ $item->active ? 'active' : '' }}">
                                <span>{{ $item->label }}</span>
                                <x-heroicon-s-chevron-down class="h-6 w-6 text-gold" />
                            </a>
                            <div x-show="open"
                                class="absolute z-10 left-1/2 transform -translate-x-1/2 mt-3 px-2 w-screen max-w-xs sm:px-0"
                                @click.outside="open = false">
                                <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
                                    <div class="relative grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-8">
                                        @foreach ($item->children as $child)
                                            <a href="{{ $child->url }}"
                                                class="-m-3  p-3 block rounded-md hover:bg-gray-50 {{ $child->classes ?? '' }} {{ $child->active ? 'active' : '' }}">{{ $child->label }}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <a href="{{ $item->url }}"
                            class="text-lg font-medium text-gray-500 hover:text-gray-900 {{ $item->classes ?? '' }} {{ $item->active ? 'active' : '' }}">
                            {{ $item->label }}
                        </a>
                    @endif
                @endforeach
            </nav>
        </div>
    </div>

    <div x-data="{ open: false }">
        <div class="-mr-2 -mt-2 lg:hidden text-center md:text-right">

            <div x-show="!open">
                <button @click="open = true" type="button"
                    class="rounded-md mt-2 p-2 inline-flex items-center justify-center bg-gray-100 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                    aria-expanded="false">
                    <span class="sr-only">Open menu</span>
                    <x-heroicon-s-menu class="h-6 w-6" />
                </button>
            </div>

            <div x-show="open">
                <button @click="open = false" type="button"
                    class="rounded-md mt-2 p-2 inline-flex items-center justify-center bg-gray-100 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                    aria-expanded="false">
                    <span class="sr-only">Close menu</span>
                    <x-heroicon-s-x class="h-6 w-6" />
                </button>
            </div>
        </div>

        <div x-show="open" x-transition x-transition:leave.duration.100ms
            class="absolute top-24 left-0 p-2 w-full transition transform origin-top-right lg:hidden z-40">
            <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-white divide-y-2 divide-gray-50">
                <div class="pt-5 pb-6 px-5 md:mt-0">
                    <div class="mt-6">
                        <nav class="grid gap-6">
                            @foreach ($navigation as $item)
                                <a href="{{ $item->url }}"
                                    class="-m-3 p-3 flex items-center hover:bg-gray-50 border-b-2">
                                    {{ $item->label }}
                                </a>
                            @endforeach
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endif --}}