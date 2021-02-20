<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex space-x-5">
    <div class="w-3/5 bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 font-montserrat">
        <div class="flex space-x-3 items-center">
            <img class="border w-56 h-32 rounded-lg object-cover" src="{{ asset('storage/' . $event->thumbnail) }}" alt="">
            <div>
                <p class="font-medium text-lg text-violet-dark">{{ $event->title }}</p>
                <p class="text-sm text-violet-middle mb-4">Dibuat Oleh {{ $event->user->name }}</p>
                <div class="space-x-2">
                    <span class="text-green-dark font-semibold">Total Hadiah</span>
                    <span class="bg-green-dark px-3 py-1 font-medium text-white rounded-lg">Rp. {{ number_format($event->total_prize) }}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="w-2/5 bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
        <div class="font-montserrat">
            <p  class="font-semibold text-lg text-violet-middle">Pembayaran</p>

            <div class="flex justify-between mt-3">
                <div class="border-2 {{ ($bank == 'BCAVA' ) ? 'border-violet-middle' : 'border-violet-light' }}  p-2 rounded-lg w-28 hover:border-2 hover:border-violet-middle cursor-pointer" wire:click.prevent="changePayment('BCAVA')">
                    <img src="{{ asset('asset/img/pembayaran/bca.png') }}" alt="">
                </div>
                <div class="border-2 {{ ($bank == 'MANDIRIVA' ) ? 'border-violet-middle' : 'border-violet-light' }} p-2 rounded-lg w-32 hover:border-violet-middle cursor-pointer" wire:click.prevent="changePayment('MANDIRIVA', {{ $event }})">
                    <img class="h-full" src="{{ asset('asset/img/pembayaran/mandiri.png') }}" alt="">
                </div>
                <div class="border-2 {{ ($bank == 'BNIVA' ) ? 'border-violet-middle' : 'border-violet-light' }} p-3 rounded-lg w-28 hover:border-violet-middle cursor-pointer" wire:click.prevent="changePayment('BNIVA')">
                    <img src="{{ asset('asset/img/pembayaran/bni.png') }}" alt="">
                </div>
            </div>

            <hr class="mt-6">

            <div class="relative">

                <div class="w-full h-full rounded-md bg-white absolute" wire:loading wire:target="changePayment">
                    <img class="w-20 h-20" src="{{ asset('asset/gif/spinner-green-dark.gif') }}" alt="">
                    <span>Tunggu Sebentar</span>
                </div>

                <div class="mt-6 space-y-2">
                    <div class="flex justify-between">
                        <p class="text-sm font-montserrat text-violet-middle">Harga Bayar</p>
                        <p class="text-base font-montserrat text-violet-dark">Rp. {{ number_format($event->total_prize ) }}</p>
                    </div>
                    <div class="flex justify-between">
                        <p class="text-sm font-montserrat text-violet-middle">Fee</p>
                        <p class="text-base font-montserrat text-violet-dark">Rp. 10,000</p>
                    </div>
                    <div class="flex justify-between">
                        <p class="text-sm font-montserrat text-violet-middle">Total Bayar</p>
                        <p class="font-bold text-base font-montserrat text-violet-dark">Rp. {{ number_format($event->total_prize + 10000) }}</p>
                    </div>
                </div>

                <hr class="mt-6">

                <p  class="font-semibold text-lg text-violet-middle mt-6">Transfer Pembayaran</p>

                <div class="mt-3 space-y-2">
                    <div class="flex justify-between">
                        <p class="text-sm font-montserrat text-violet-middle">Bank</p>
                        <p class="font-bold text-base font-montserrat text-violet-dark">{{ $bank }}</p>
                    </div>
                    <div class="flex justify-between">
                        <p class="text-sm font-montserrat text-violet-middle">No. VA</p>
                        <p class="font-bold text-base font-montserrat text-violet-dark">{{ $requestPembayaran['pay_code'] }}</p>
                    </div>
                </div>

                <hr class="mt-6">

                <p class="font-semibold text-lg text-violet-middle mt-6">Cara Pembayaran</p>
                <ul class="mt-3">
                    @foreach ($instruksi as $i)
                        <li class="leading-loose text-sm font-montserrat text-violet-middle"> {{ $loop->iteration }}. {!! $i !!}</li>
                    @endforeach
                </ul>

                <hr class="mt-6">

                <p class="font-semibold text-lg text-violet-middle mt-6">Konfirmasi Pembayaran</p>
                <div>
                    <div class="mt-3">
                        <div class="flex space-x-3">
                            <svg width="30" height="30" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M21.42 10.34L19.56 8.21005L19.82 5.39005C19.87 4.89005 19.53 4.43005 19.05 4.32005L16.29 3.70005L14.85 1.26005C14.59 0.830047 14.06 0.650047 13.59 0.850047L11 1.96005L8.41001 0.850047C7.95001 0.650047 7.41001 0.830047 7.16001 1.26005L5.71001 3.69005L2.96001 4.31005C2.47001 4.42005 2.13001 4.87005 2.18001 5.37005L2.44001 8.20005L0.57001 10.34C0.24001 10.72 0.24001 11.28 0.57001 11.66L2.44001 13.79L2.18001 16.62C2.13001 17.12 2.47001 17.58 2.95001 17.69L5.71001 18.32L7.15001 20.75C7.41001 21.18 7.95001 21.36 8.41001 21.16L11 20.03L13.59 21.14C14.05 21.34 14.59 21.16 14.84 20.73L16.28 18.3L19.04 17.67C19.53 17.56 19.86 17.1 19.81 16.6L19.55 13.78L21.41 11.65C21.573 11.4714 21.6642 11.2388 21.6661 10.997C21.6679 10.7551 21.5803 10.5212 21.42 10.34V10.34ZM9.23001 13.83L7.11001 11.71C7.01743 11.6175 6.94399 11.5076 6.89388 11.3866C6.84378 11.2656 6.81799 11.136 6.81799 11.005C6.81799 10.8741 6.84378 10.7445 6.89388 10.6235C6.94399 10.5025 7.01743 10.3926 7.11001 10.3C7.20259 10.2075 7.3125 10.134 7.43347 10.0839C7.55443 10.0338 7.68408 10.008 7.81501 10.008C7.94594 10.008 8.07559 10.0338 8.19655 10.0839C8.31752 10.134 8.42743 10.2075 8.52001 10.3L9.93001 11.71L13.47 8.17005C13.5626 8.07747 13.6725 8.00402 13.7935 7.95392C13.9144 7.90381 14.0441 7.87803 14.175 7.87803C14.3059 7.87803 14.4356 7.90381 14.5566 7.95392C14.6775 8.00402 14.7874 8.07747 14.88 8.17005C14.9726 8.26263 15.046 8.37254 15.0961 8.4935C15.1462 8.61447 15.172 8.74412 15.172 8.87505C15.172 9.00598 15.1462 9.13563 15.0961 9.25659C15.046 9.37755 14.9726 9.48747 14.88 9.58005L10.64 13.82C10.26 14.22 9.62001 14.22 9.23001 13.83V13.83Z" fill="#1DBF73"/>
                            </svg>
                            <span class="font-medium text-sm text-violet-light">
                                Pembayaran dikonfirmasi otomatis. jika ada masalah silahkan hubungi admin
                            </span>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>