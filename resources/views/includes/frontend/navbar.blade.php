<header class="mt-10 flex justify-between">
    <a href="/" class="flex items-center">
        <img src="{{ asset('asset/icon/navbar-brand.png') }}" alt="" />
        <span class="ml-3 font-montserrat font-bold text-base lg:text-xl">LombaKu</span>
    </a>
    <div class="w-4/12 relative invisible lg:visible">
        <livewire:event.navbar-search>

        <span class="absolute right-2 top-3">
            <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="5.80486" cy="5.30486" r="4.39023" stroke="#545481" stroke-width="1.82926"/>
                <rect x="8.89606" y="6.93318" width="5.81608" height="1.98134" rx="0.990671" transform="rotate(39.5699 8.89606 6.93318)" fill="#545481"/>
            </svg>
        </span>
    </div>

    @guest
    <button class="w-20 rounded-md bg-green-dark text-center text-white font-montserrat hover:bg-green-600">
        <a class="w-full" href="{{ route('login') }}">Login</a>
    </button>
    @endguest

    @auth
    <div class="flex items-center space-x-8 invisible lg:visible">
        <a href="{{ route('app.event.create') }}">
            <svg width="24" height="17" viewBox="0 0 24 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M20.16 7.2975C20.3137 6.89625 20.4 6.4575 20.4 6C20.4 4.0125 18.7875 2.4 16.8 2.4C16.0613 2.4 15.3713 2.625 14.8013 3.0075C13.7625 1.2075 11.8238 0 9.6 0C6.285 0 3.6 2.685 3.6 6C3.6 6.10125 3.60375 6.2025 3.6075 6.30375C1.5075 7.0425 0 9.045 0 11.4C0 14.3812 2.41875 16.8 5.4 16.8H19.2C21.8513 16.8 24 14.6512 24 12C24 9.67875 22.35 7.74 20.16 7.2975ZM14.7525 9.6H12.3V13.8C12.3 14.13 12.03 14.4 11.7 14.4H9.9C9.57 14.4 9.3 14.13 9.3 13.8V9.6H6.8475C6.31125 9.6 6.045 8.955 6.42375 8.57625L10.3763 4.62375C10.6088 4.39125 10.9913 4.39125 11.2238 4.62375L15.1763 8.57625C15.555 8.955 15.285 9.6 14.7525 9.6Z" fill="#0D084D"/>
            </svg>
        </a>

        <livewire:event.notification>

        <div class="w-8 h-8 relative" x-data="{ open : false }">
            <div class="rounded-full cursor-pointer overflow-hidden" @click="open = true">
                <img class="" src="{{ asset('asset/img/avatar.png') }}" alt="" />
            </div>
            <div class="absolute w-44 h-auto bg-gray-50 top-12 right-0 border border-violet-dark rounded-md z-10 p-5 font-montserrat space-y-3" x-show="open" @click.away="open = false">
                <a href="{{ route('dashboard') }}" class="block hover:text-violet-dark text-violet-middle font-medium">Dashboard</a>
                <a href="{{ route('app.event') }}" class="block hover:text-violet-dark text-violet-middle font-medium">Lomba</a>
                <a href="{{ route('profile.show') }}" class="block hover:text-violet-dark text-violet-middle font-medium">Profil</a>
                <hr>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="block hover:text-violet-dark text-violet-middle font-medium">Logout</button>
                </form>
            </div>
        </div>
    </div>
    @endauth

</header>