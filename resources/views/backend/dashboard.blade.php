<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Beranda') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-12">
                <div class="flex space-x-5">
                    <div class="w-2/5">
                        <div class="w-full bg-green-dark p-6 rounded-2xl font-montserrat">
                            <p class="uppercase text-sm font-semibold text-gray-100">Detail Keuangan</p>
                            <p class="text-3xl text-white font-semibold mt-8">Rp. 0</p>
                            <div class="flex justify-between mt-5 text-gray-100">
                                <div>
                                    <span class="font-semibold">Pemasukan</span>
                                    <p class="text-sm mt-2">Rp. 0</p>
                                </div>
                                <div>
                                    <span class="font-semibold">Pengeluaran</span>
                                    <p class="text-sm mt-2">Rp. 0</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-3/5">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati, velit sequi, facilis maiores cupiditate quo consequuntur iure dolorem fugiat magni optio eos eaque voluptatum, corporis non nesciunt unde architecto labore.
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
