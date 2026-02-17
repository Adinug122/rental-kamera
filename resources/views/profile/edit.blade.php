<x-layouts.app>
  <div class="min-h-screen bg-gray-50 pt-24 pb-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            
            <div class="lg:grid lg:grid-cols-12 lg:gap-8">
          
                <div class="hidden lg:block lg:col-span-3">
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden sticky top-24">
                    
                        <div class="p-4 border-b border-gray-100 flex items-center gap-3">
                            <div class="avatar placeholder">
                                <div class="bg-neutral text-neutral-content rounded-full w-10">
                                    <span class="text-lg font-bold">{{ substr(Auth::user()->name, 0, 1) }}</span>
                                </div>
                            </div>
                            <div class="overflow-hidden">
                                <h3 class="font-bold text-gray-900 truncate">{{ Auth::user()->name }}</h3>
                                <p class="text-xs text-gray-500 truncate">{{ Auth::user()->email }}</p>
                            </div>
                        </div>

                      
                        <nav class="p-2 space-y-1">
                            <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 px-3 py-2 text-sm font-medium text-gray-600 rounded-lg hover:bg-gray-50">
                                <span class="icon-[tabler--user] size-5 text-gray-400"></span>
                                Profil Saya
                            </a>
                            
                            {{-- Menu Aktif (Riwayat) --}}
                            <a href="{{ route('history') }}" class="flex items-center gap-3 px-3 py-2 text-sm font-bold text-primary bg-primary/5 rounded-lg">
                                <span class="icon-[tabler--list-details] size-5"></span>
                                Daftar Transaksi
                            </a>

                
                            <div class="border-t border-gray-100 my-2 pt-2">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="w-full flex items-center gap-3 px-3 py-2 text-sm font-medium text-red-600 rounded-lg hover:bg-red-50">
                                        <span class="icon-[tabler--logout] size-5"></span>
                                        Keluar
                                    </button>
                                </form>
                            </div>
                        </nav>
                    </div>
                </div>

             
                <div class="mt-8 lg:mt-0 lg:col-span-9 space-y-6">
           
                        <h1 class="text-black text-xl font-bold">Profile</h1>
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
           
                </div>

            </div>
        </div>
    </div>
    </x-layouts.app>