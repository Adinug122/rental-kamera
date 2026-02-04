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
              <a class="text-black transition hover:text-gray-600 font-inter    " href="#home"> Home </a>
            </li>

            <li>
              <a class="text-black transition hover:text-gray-600 font-inter    " href="#about"> About </a>
            </li>

            <li>
              <a class="text-black transition hover:text-gray-600 font-inter    " href="#produk"> Produk </a>
            </li>

            <li>
              <a class="text-black transition hover:text-gray-600 font-inter    " href="#contact"> Kontak </a>
            </li>

            <li>
              <a class="text-black transition hover:text-gray-600 font-inter    " href="{{ route('register') }}"> Register </a>
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