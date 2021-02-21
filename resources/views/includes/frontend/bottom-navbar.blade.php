<!-- START BOTTOM NAVBAR -->
<div class="w-full md:hidden">
    <section id="bottom-navigation" class="block fixed inset-x-0 bottom-0 z-10 bg-green-light shadow">
        <div id="tabs" class="flex justify-between">
            <a href="{{ route('public.home') }}" class="w-full justify-center inline-block text-center pt-2 pb-1 {{ request()->is('/') ? 'text-violet-dark' : 'text-violet-light' }} ">
                <svg height="25" width="25" class="inline-block mb-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                </svg>
                <span class="tab tab-home block text-xs">Beranda</span>
            </a>
            <a href="{{ route('app.event') }}" class="w-full justify-center inline-block text-center pt-2 pb-1 {{ request()->is('/event') ? 'text-violet-dark' : 'text-violet-light' }}">
                <svg height="24" width="24" class="inline-block mb-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z" />
                  </svg>
                <span class="tab tab-kategori block text-xs">Riwayat</span>
            </a>
            <a href="{{ route('notifications') }}" class="w-full justify-center inline-block text-center pt-2 pb-1 {{ request()->is('/notifications') ? 'text-violet-dark' : 'text-violet-light' }}">
                <svg height="24" width="24" class="inline-block mb-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" />
                  </svg>
                <span class="tab tab-explore block text-xs">Notifikasi</span>
            </a>
            <a href="{{ route('dashboard') }}" class="w-full justify-center inline-block text-center pt-2 pb-1 {{ request()->is('/dashboard') ? 'text-violet-dark' : 'text-violet-light' }}">
                <svg height="25" width="25" class="inline-block mb-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M11 17a1 1 0 001.447.894l4-2A1 1 0 0017 15V9.236a1 1 0 00-1.447-.894l-4 2a1 1 0 00-.553.894V17zM15.211 6.276a1 1 0 000-1.788l-4.764-2.382a1 1 0 00-.894 0L4.789 4.488a1 1 0 000 1.788l4.764 2.382a1 1 0 00.894 0l4.764-2.382zM4.447 8.342A1 1 0 003 9.236V15a1 1 0 00.553.894l4 2A1 1 0 009 17v-5.764a1 1 0 00-.553-.894l-4-2z" />
                </svg>
                <span class="tab tab-account block text-xs">Dashboard</span>
            </a>
        </div>
    </section>
</div>
<!-- END BOTTOM NAVBAR -->