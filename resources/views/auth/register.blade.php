<x-guest-layout>
    <div class="flex flex-col justify-center items-center">
        <div class="text-center mb-8">
            <h1 class="font-bold text-3xl text-black tracking-tight">Lens.id</h1>
            <p class="text-gray-500 text-sm mt-2">Daftar akun baru untuk mulai menyewa</p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="w-full">
            @csrf

            <div>
                <x-input-label for="name" :value="__('Nama Lengkap')" class="text-gray-800 font-medium" />
                <x-text-input id="name" 
                    class="block mt-1 w-full border-gray-300 focus:!border-black focus:!ring-black rounded-md shadow-sm placeholder-gray-400" 
                    type="text" 
                    name="name" 
                    :value="old('name')" 
                    required autofocus autocomplete="name" 
                    placeholder="Masukkan nama lengkap" />
                <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-600" />
            </div>

            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" class="text-gray-800 font-medium" />
                <x-text-input id="email" 
                    class="block mt-1 w-full border-gray-300 focus:!border-black focus:!ring-black rounded-md shadow-sm placeholder-gray-400" 
                    type="email" 
                    name="email" 
                    :value="old('email')" 
                    required autocomplete="username" 
                    placeholder="nama@email.com" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />
            </div>

            <div class="mt-4">
                <x-input-label for="phone" :value="__('No. Telepon / WhatsApp')" class="text-gray-800 font-medium" />
                <x-text-input id="phone" 
                    class="block mt-1 w-full border-gray-300 focus:!border-black focus:!ring-black rounded-md shadow-sm placeholder-gray-400"
                    type="number"
                    name="phone"
                    :value="old('phone')"
                    required autocomplete="tel" 
                    placeholder="08xxxxxxxxxx" />
                <x-input-error :messages="$errors->get('phone')" class="mt-2 text-red-600" />
            </div>
            
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" class="text-gray-800 font-medium" />
                <x-text-input id="password" 
                    class="block mt-1 w-full border-gray-300 focus:!border-black focus:!ring-black rounded-md shadow-sm placeholder-gray-400"
                    type="password"
                    name="password"
                    required autocomplete="new-password" 
                    placeholder="••••••••" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600" />
            </div>

            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" class="text-gray-800 font-medium" />
                <x-text-input id="password_confirmation" 
                    class="block mt-1 w-full border-gray-300 focus:!border-black focus:!ring-black rounded-md shadow-sm placeholder-gray-400"
                    type="password"
                    name="password_confirmation" 
                    required autocomplete="new-password" 
                    placeholder="••••••••" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-600" />
            </div>

            <div class="mt-8">
                <button type="submit" 
                    class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-bold text-white bg-black hover:bg-gray-800 focus:outline-none focus:!ring-2 focus:!ring-offset-2 focus:!ring-gray-900 transition duration-150">
                    {{ __('Daftar Sekarang') }}
                </button>
            </div>

            <div class="mt-6 text-center">
                <span class="text-sm text-gray-500">Sudah punya akun?</span>
                <a class="text-sm text-black  hover:underline transition duration-150 ease-in-out ml-1" href="{{ route('login') }}">
                    {{ __('Masuk di sini') }}
                </a>
            </div>
        </form>
    </div>
</x-guest-layout>