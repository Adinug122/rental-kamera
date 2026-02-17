<header x-data="{open: false}" class="bg-white fixed z-50 w-full">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="flex h-16 items-center justify-between">
      <div class="flex-1 md:flex md:items-center md:gap-12">
        <a class="block text-black text-4xl font-bold  font-lobster" href="#">
      <h2>Lens.id</h2>
        </a>
      </div>

      <div class="md:flex md:items-center md:gap-12">
        <nav aria-label="Global" class="hidden md:block">
          <ul class="flex items-center gap-8 text-sm">
            <li>
              <a class="text-black transition hover:text-gray-600 font-inter    " href="{{ route('landing') }}#home"> Home </a>
            </li>

            <li>
              <a class="text-black transition hover:text-gray-600 font-inter    " href="{{ route('landing') }}#about"> About </a>
            </li>

            <li>
              <a class="text-black transition hover:text-gray-600 font-inter    " href="{{ route('produk') }}"> Produk </a>
            </li>

            <li>
              <a class="text-black transition hover:text-gray-600 font-inter    " href="{{ route('landing') }}#contact"> Kontak </a>
            </li>

           <li>
          @guest
              <a class="text-black transition hover:text-gray-600 font-inter" href="{{ route('register') }}">
                  Register
              </a>
          @endguest

      @auth
         <div x-data="{open:false}" class="relative">
           <button 
        @click="open = !open"
        class="flex items-center gap-2 font-semibold hover:text-gray-600">

        <span>
            {{ auth()->user()->name }}
        </span>

        <svg class="w-4 h-4 transition-transform duration-200"
             :class="open ? 'rotate-180' : ''"
             fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
        </svg>
    </button>
          <div x-show="open"
          @click.outside ="open = false"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-90"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-90"
        class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 shadow-md rounded-lg p-3"
        >
          <a href="{{ route('history') }}" class="block w-full px-4 py-2 text-sm hover:text-gray-600 text-left">Riwayat Sewa</a>
          <div class="border-t border-x-gray-600"></div>
          <form action="{{ route('logout') }}" method="POST">
            @csrf
          <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:text-red-700">
                         Logout
                    </button>
          </form>
          
          </div>
         </div>
      @endauth


      </li>

          </ul>
        </nav>

        <div class="flex items-center gap-4">
          <div class="block md:hidden">
            <button @click="open = !open"  class="z-10 rounded-sm bg-gray-100 p-2 text-gray-600 transition hover:text-gray-600/75">
              <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
              </svg>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
<ul
  x-show="open"
  x-transition.duration.300ms
  @click.outside="open = false"
  class="md:hidden absolute top-16 left-0 w-full z-40 bg-white shadow-xl
         px-6 py-5 space-y-4 text-gray-800"
>
  <li>
    <a href="#home" class="block rounded-lg px-4 py-3 text-base font-medium
                      hover:bg-gray-100 transition">
      Home
    </a>
  </li>

  <li>
    <a href="#about" class="block rounded-lg px-4 py-3 text-base font-medium
                      hover:bg-gray-100 transition">
      About
    </a>
  </li>

  <li>
    <a href="#produk" class="block rounded-lg px-4 py-3 text-base font-medium
                      hover:bg-gray-100 transition">
      Produk
    </a>
  </li>

  <li>
    <a href="#contact" class="block rounded-lg px-4 py-3 text-base font-medium
                      hover:bg-gray-100 transition">
      Contact
    </a>
  </li>

  <li>
    <a href="{{ route('register') }}" class="block rounded-lg px-4 py-3 text-base font-semibold
                      bg-black text-white hover:bg-gray-800 transition">
      Register
    </a>
  </li>
</ul>

</header>