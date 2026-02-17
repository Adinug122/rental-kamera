<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="max-w-md mx-auto p-6 sm:p-8 bg-white  shadow-sm rounded-xl">
        
        <div class="text-center mb-8">
            <h1 class="font-extrabold text-3xl  text-black">Masuk</h1>
            <p class="text-sm text-gray-500 mt-2">Silakan masuk ke akun Anda untuk melanjutkan</p>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-5">
                <label for="email" class="block text-sm font-semibold text-black mb-1.5">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                    class="block w-full px-4 py-2.5 text-black bg-white border border-gray-300 rounded-lg focus:border-black focus:ring-black focus:ring-1 sm:text-sm transition-colors duration-200"
                    placeholder="nama@email.com">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mb-5">
                <label for="password" class="block text-sm font-semibold text-black mb-1.5">Password</label>
                <input id="password" type="password" name="password" required autocomplete="current-password"
                    class="block w-full px-4 py-2.5 text-black bg-white border border-gray-300 rounded-lg focus:border-black focus:ring-black focus:ring-1 sm:text-sm transition-colors duration-200"
                    placeholder="••••••••">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="flex items-center justify-between mb-6">
                <label for="remember_me" class="flex items-center cursor-pointer">
                    <input id="remember_me" type="checkbox" name="remember"
                        class="w-4 h-4 text-black bg-white border-gray-300 rounded focus:ring-black focus:ring-2">
                    <span class="ms-2 text-sm font-medium text-gray-700">Ingat saya</span>
                </label>

                @if (Route::has('password.request'))
                    <a class="text-sm font-medium text-gray-500 hover:text-black hover:underline transition-colors" href="{{ route('password.request') }}">
                        Lupa password?
                    </a>
                @endif
            </div>

            <div>
                <button type="submit" 
                    class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-bold text-white bg-black hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black transition-all duration-200">
                    Masuk Sekarang
                </button>
            </div>
            
            @if (Route::has('register'))
            <div class="mt-6 text-center text-sm text-gray-600">
                Belum punya akun? 
                <a href="{{ route('register') }}" class="font-bold text-black hover:underline transition-colors">Daftar di sini</a>
            </div>
            @endif
            
        </form>
    </div>
</x-guest-layout>