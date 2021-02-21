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
                                    <p class="text-sm mt-2">Rp. {{ ( $user->transactions != null ) ? number_format($user->transactions->sum('amount')) : 0 }}</p>
                                </div>
                                <div>
                                    <span class="font-semibold">Pengeluaran</span>
                                    <p class="text-sm mt-2">Rp. 0</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-3/5">
                        <!-- component -->
                        <div class="bg-gray-100 px-3 rounded">
                            <table class="text-left w-full border-separate" style="border-spacing: 0 20px;"> <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                                <thead>
                                    <tr>
                                        <th class="py-4 px-6 bg-gray-100 text-gray-400 font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Nama Lomba</th>
                                        <th class="py-4 px-6 bg-gray-100 text-gray-400 font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Total Hadiah</th>
                                        <th class="py-4 px-6 bg-gray-100 text-gray-400 font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($eventUser as $e)
                                    <tr class="bg-white hover:bg-green-light">
                                        <td class="py-4 px-6 border-b border-grey-light">{{ $e->event->title }}</td>
                                        <td class="py-4 px-6 border-b border-grey-light">
                                            <span class="px-2">Rp. {{ ($e->event->total_prize > 1000) ? $e->event->total_prize / 1000 . 'K' :  $e->event->total_prize}}</span>
                                        </td>
                                        <td class="py-4 px-6 border-b border-grey-light">
                                            <span class="bg-yellow-200 px-2 rounded-md text-yellow-600 font-semibold">Ongoing</span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
