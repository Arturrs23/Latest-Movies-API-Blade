@if ($navigation)
<div x-data="{ open: false }">
  <nav :class="{'flex': open, 'hidden': !open}" class="hidden  bg-black p-4 md:pb-0 lg:flex lg:justify-center lg:flex-row ">
  <ul class="flex text-white flex  items-center text-2xl  space-x-4 xl:space-x-8 pl-8  rounded-md text-sm font-medium cursor-pointer text-white  font-bebas">
    @foreach ($navigation as $item)
      @if ($item->children)

        <li @click.away="open = false"
        class="relative ml-4 mr-1 hover:text-tcol"
        x-data="{ open: false, timeout: null }"
        x-on:mouseenter="open = true; clearTimeout(timeout)"
        x-on:mouseleave="timeout = setTimeout(() => { open = false }, 100)"
        >
          <button @click="open = !open" class="flex flex-row">
          <a class="tracking-widest focus:outline-none uppercase {{ $item->classes ?? '' }} {{ $item->active ? 'text-tcol border-b-2 border-tcol pb-2' : '' }}" href="{{ $item->url }}">
            {{ $item->label }}
          </a>
          <svg
            viewBox="0 0 24 12"
            :class="{'rotate-180': open, 'rotate-0': !open}"
            class="inline w-4 h-4 transition-transform duration-200 transform text-white"
            x-cloak
            >
            <path d="M12 9.67a.68.68 0 01-.48-.19l-6-6a.68.68 0 011-1L12 8l5.52-5.52a.68.68 0 011 1l-6 6a.68.68 0 01-.52.19z" fill="currentColor"/>
          </svg>
          </button>

          <div
            x-show="open"
            class="absolute left-0 w-full mt-2 origin-top-right shadow-lg md:w-40 z-30"
            style="display: none;"
          >
            <ul class="p-3 bg-white rounded-md shadow-2xl">
              @foreach ($item->children as $child)
                <li @click.away="open = false"
                class="relative py-2" style="padding-top: 10px;"
                x-data="{ open: false, timeout: null }"
                x-on:mouseenter="open = true; clearTimeout(timeout)"
                x-on:mouseleave="timeout = setTimeout(() => { open = false }, 100)"
                >
                <button @click="open = !open">
                  <span class="flex justify-between">
                    <a class="text-pcol" href="{{ $item->url }}">
                      {{ $child->label }}
                    </a>
                    @if ($child->children)
                    <svg class="text-scol pl-2" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg" width="24" height="20"><path d="M13.5 7.5l-4-4m4 4l-4 4m4-4H1" stroke="currentColor" stroke-linecap="square"></path></svg>
                    @endif
                  </span>
                </button>

                  <div
                    x-show="open"
                    style="display: none;"
                    class="transition duration-500 ease-in-out"
                  >
                    @if ($child->children)
                    <ul class="absolute bg-white shadow-xl rounded-tr rounded-br rounded-bl w-48 p-4" style="left: 143px; top: -12px;">
                      @foreach ($child->children as $secondChild)
                      <li class="grid py-2">
                        <a class="text-pcol hover:text-scol {{ $item->classes ?? '' }} {{ $item->active ? '' : '' }}" href="{{ $item->url }}">
                          {{ $secondChild->label }}
                        </a>
                      </li>
                      @endforeach
                    </ul>
                    @endif
                  </div>

              </li>
              @endforeach
            </ul>
          </div>

        </li>

      @else
      <li class="mx-4 hover:text-tcol">
        <a class="tracking-widest focus:outline-none uppercase {{ $item->classes ?? '' }} {{ $item->active ? 'text-tcol border-b-2 border-tcol pb-2' : '' }}" href="{{ $item->url }}">
          {{ $item->label }}
        </a>
      </li>
      @endif
    @endforeach
    </ul>
  </nav>
</div>

@endif