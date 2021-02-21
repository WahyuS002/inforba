<footer class="mt-36 bg-green-light w-full h-auto mb-12 lg:mb-0">
    <div class="container mx-auto px-12 lg:px-24 py-12 font-montserrat">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 space-y-6 lg:space-x-12">
            <div>
                <img class="w-12 h-12" src="{{ asset('asset/icon/navbar-brand-large.png') }}" alt="">
                <p class="mt-4 text-sm text-violet-middle leading-loose">Aplikasi Kasir Online OASSE dikembangkan oleh <span class="text-green-dark font-bold">Wahyu Syahputra</span></p>
            </div>
            <div>
                <p class="text-violet-middle font-semibold text-xl">Kontak Kami</p>
                <div class="py-6">
                    <p class="text-sm text-violet-middle leading-loose">Jl Hibrida 15 no 15 B Sidomulyo, Bengkulu, Indonesia 38229</p>
                </div>
                <p class="text-violet-middle font-medium">Telepon:</p>
                <p class="mt-3 text-green-dark font-bold text-sm">0823 7555 8906</p>
                <p class="text-violet-middle font-medium mt-3">E-mail:</p>
                <p class="mt-3 text-green-dark font-bold text-sm">syahputrawahyu61@gmail.com</p>
            </div>
            <div>
                <p class="text-violet-middle font-semibold text-xl">Tautan Terkait</p>
                <p class="text-sm text-violet-middle mt-6">
                    <a href="{{ route('public.home') }}">Beranda</a>
                </p>
            </div>
        </div>
    </div>
</footer>