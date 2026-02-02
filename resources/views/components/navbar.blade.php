<header class="bg-white">
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
              <a class="text-black transition hover:text-gray-600 font-inter    " href="#"> Home </a>
            </li>

            <li>
              <a class="text-black transition hover:text-gray-600 font-inter    " href="#"> About </a>
            </li>

            <li>
              <a class="text-black transition hover:text-gray-600 font-inter    " href="#"> Produk </a>
            </li>

            <li>
              <a class="text-black transition hover:text-gray-600 font-inter    " href="#"> Kontak </a>
            </li>

            <li>
              <a class="text-black transition hover:text-gray-600 font-inter    " href="{{ route('register') }}"> Register </a>
            </li>
          </ul>
        </nav>

        <div class="flex items-center gap-4">
          <div class="block md:hidden">
            <button class="rounded-sm bg-gray-100 p-2 text-gray-600 transition hover:text-gray-600/75">
              <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
              </svg>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>