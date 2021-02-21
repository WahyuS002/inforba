<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Semua Notifikasi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-12">
                <a href="#" class="block hover:text-violet-dark text-violet-middle font-medium">
                    <div class="flex items-center space-x-2 px-12">
                        <img class="w-14 h-14 rounded-full" src="https://picsum.photos/32/32/?random" alt="">
                        <div class="">
                            <p class="text-md">Wahyu dan 30 orang lainnya mengikuti lomba anda</p>
                            <p class="text-md text-green-dark font-bold">16 jam yang lalu</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>