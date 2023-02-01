{{-- <div class="flex justify-between items-center lg:py-3 lg:justify-start lg:space-x-10">
        <div class="hidden lg:flex-1 lg:flex lg:items-center lg:justify-between">
            <nav class="flex space-x-10 w-full justify-between">
                @foreach ($navigation as $item)
                    @if ($item->children)
                        <div x-data="{ open: false }" class="relative flex" @mouseleave="open = false">
                            <a @mouseover="open = true" href="{{$item->url}}" data-text="{{ $item->label }}"
                            class="dropdown-item font-normal text-black hover:text-purple relative overflow-hidden pb-8 before:content-[attr(data-text)attr(data-text)] hover:before:underline before:underline-offset-8 before:decoration-wavy before:decoration-purple before:absolute before:whitespace-nowrap before:text-transparent hover:before:animate-waves {{ $item->classes ?? '' }} {{ $item->active ? 'active' : '' }}">
                                {{ $item->label }}
                     
                            </a>
                            <div x-show="open"
                                class="absolute z-10 left-1/2 transform -translate-x-1/2 mt-3 px-2 w-screen max-w-[150px] sm:px-0"
                                >
                                <div x-data="{ subItem: false }" @mouseleave="subItem = false" class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5">
                                    <div  class="relative grid bg-white px-5 py-6">
                                        @foreach ($item->children as $child)
                                            <a @mouseover="subItem = true" href="{{ $child->url }}"
                                                class="-m-3 p-3 block rounded-md hover:bg-gray-50 hover:text-purple {{ $child->classes ?? '' }} {{ $child->active ? 'active' : '' }}">{{ $child->label }}</a>
                                            <div x-show="subItem" class="absolute z-10 transform translate-x-full translate-y-2 px-2 w-screen max-w-[150px] sm:px-0"
                                                >
                                                <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
                                                    <div class="relative grid bg-white px-5 py-6">
                                                        @foreach ($child->children as $subChild)
                                                            <a href="{{ $subChild->url }}"
                                                                class="-m-3  p-3 block rounded-md hover:bg-gray-50 hover:text-purple {{ $subChild->classes ?? '' }} {{ $subChild->active ? 'active' : '' }}">{{ $subChild->label }}</a>
                                                               
                                                        @endforeach
                                                    </div>
                                                </div> 
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <a data-text="{{ $item->label }}" href="{{ $item->url }}"
                            class=" font-normal text-black hover:text-purple relative overflow-hidden pb-8 before:content-[attr(data-text)attr(data-text)] hover:before:underline before:underline-offset-8 before:decoration-wavy before:decoration-purple before:absolute before:whitespace-nowrap before:text-transparent hover:before:animate-wave {{ $item->classes ?? '' }} {{ $item->active ? 'active' : '' }}">
                            {{ $item->label }}
                        </a>
                    @endif
                @endforeach
            </nav>
        </div>
    </div> --}}
    