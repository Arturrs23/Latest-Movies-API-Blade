<footer class=" content-info bg-black">
    <div class="">
    <div class="row">
  
      <h2 class="text-center mx-auto xs:text-6xl max-w-lg text-red-600 font-bebas text-7xl p-6 ">NETFLIX</h2>
      <p class="text-center mx-auto xs:text-2xl max-w-lg text-white p-3 ">ⓒ 2022 All rights reserved</p>
  
      <nav class="sticky top-0 z-50 list-none p-6 hidden lg:flex  bg-black">
        @if ($navigationFooter)
        <div class="flex text-center mx-auto xs:text-2xl max-w-lg text-red-600 font-bebas">
            <div class="hidden lg:flex-1 lg:flex lg:items-center lg:justify-center">
                <nav class="flex space-x-10 w-full justify-center">
                    @foreach ($navigationFooter as $item)
                        @if ($item->children)
                            <div x-data="{ open: false }" class="relative">
                                <a @click="open = true" href="#" class="text-lg text-gray-500 group rounded-md inline-flex items-center font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 {{ $item->classes ?? '' }} {{ $item->active ? 'active' : '' }}">
                                    <span>{{ $item->label }}</span>
                                </a>
                                <div x-show="open"
                                    class="absolute z-10 left-1/2 transform -translate-x-1/2 mt-3 px-2 w-screen max-w-xs sm:px-0"
                                    @click.outside="open = false">
                                    <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
                                        <div class="relative grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-8">
                                            @foreach ($item->children as $child)
                                                <a href="{{ $child->url }}" title="Visit {{ $child->label }}" class="-m-3  p-3 block rounded-md hover:bg-gray-50 {{ $child->classes ?? '' }} {{ $child->active ? 'active' : '' }}">{{ $child->label }}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <a href="{{ $item->url }}" class="text-lg font-medium text-gray-500 hover:text-gray-900 {{ $item->classes ?? '' }} {{ $item->active ? 'active' : '' }}">
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
                       
                    </button>
                </div>
                <div x-show="open">
                    <button @click="open = false" type="button"
                        class="rounded-md mt-2 p-2 inline-flex items-center justify-center bg-gray-100 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                        aria-expanded="false">
                        <span class="sr-only">Close menu</span>
                       
                    </button>
                </div>
            </div>
            <div x-show="open" x-transition x-transition:leave.duration.100ms
                class="absolute top-24 left-0 p-2 w-full transition transform origin-top-right lg:hidden z-40">
                <div class="rounded-lg shadow-lg bg-white divide-y-2 divide-gray-50">
                    <div class="p-5">
                        <nav class="grid gap-4">
                            @foreach ($navigationFooter as $item)
                                @if ($item->children)
                                    <div x-data="{ open: false }" class="relative" @click.outside="open = false">
                                        <div class="flex justify-center align-middle hover:bg-gray-50 py-2 pl-11">
                                            <a  href="{{$item->url}}" title="Visit {{ $item->label }}" data-text="{{ $item->label }}" class="-m-3 text-normal font-medium flex items-center">
                                                {{ $item->label }}
                                            </a>
                                            <span @click="open = !open" class="cursor-pointer grow flex justify-end align-middle">
                                            </span>
                                        </div>
                                        <div x-show="open" class="z-10">
                                            <div x-data="{ subItem: false }" @click.outside="subItem = false">
                                                @foreach ($item->children as $child)
                                                    <span class="flex justify-center align-middle hover:bg-gray-50 py-2 pl-12">
                                                        <a  href="{{ $child->url }}" title="Visit {{ $child->label }}" class=" {{ $child->classes ?? '' }} {{ $child->active ? 'active' : '' }}">{{ $child->label }}</a>
                                                    </span>
                                                    <div x-show="subItem" class="z-10 mt-4">
                                                        @foreach ($child->children as $subChild)
                                                            <a href="{{ $subChild->url }}" title="Visit {{ $subChild->label }}" class="-m-3 py-2 pl-20 block hover:bg-gray-50 {{ $subChild->classes ?? '' }} {{ $subChild->active ? 'active' : '' }}">
                                                                {{ $subChild->label }}
                                                            </a>
                                                        @endforeach
                                                    </div> 
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <a data-text="{{ $item->label }}" href="{{ $item->url }}" class=" -m-3 py-4 pl-11 text-normal font-medium flex items-center hover:bg-gray-50 {{ $item->classes ?? '' }} {{ $item->active ? 'active' : '' }}">
                                        {{ $item->label }}
                                    </a>
                                @endif
                            @endforeach
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    @endif
        </nav>
    </div>
    </div>
   
  
  
  
  
  
  </footer>
  