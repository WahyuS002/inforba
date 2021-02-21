<div x-data="{ open : false }">
    <span class="cursor-pointer relative" @click="open = true">
        <svg width="18" height="20" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M9 20C9.6193 20.0008 10.2235 19.8086 10.7285 19.4502C11.2335 19.0917 11.6143 18.5849 11.818 18H6.182C6.38566 18.5849 6.76648 19.0917 7.27151 19.4502C7.77654 19.8086 8.3807 20.0008 9 20ZM16 12.586V8C16 4.783 13.815 2.073 10.855 1.258C10.562 0.52 9.846 0 9 0C8.154 0 7.438 0.52 7.145 1.258C4.185 2.074 2 4.783 2 8V12.586L0.293001 14.293C0.199958 14.3857 0.126171 14.4959 0.0758854 14.6172C0.0256001 14.7386 -0.000189449 14.8687 1.04767e-06 15V16C1.04767e-06 16.2652 0.105358 16.5196 0.292894 16.7071C0.480431 16.8946 0.734785 17 1 17H17C17.2652 17 17.5196 16.8946 17.7071 16.7071C17.8946 16.5196 18 16.2652 18 16V15C18.0002 14.8687 17.9744 14.7386 17.9241 14.6172C17.8738 14.4959 17.8 14.3857 17.707 14.293L16 12.586Z" fill="#0D084D"/>
        </svg>
        <span class="bg-red-600 w-3 h-3 absolute rounded-full left-3 top-3">
        </span>

        <div class="absolute w-72 h-auto bg-gray-50 top-10 -right-5 border border-violet-dark rounded-md z-10 p-5 font-montserrat space-y-3" x-show="open" @click.away="open = false">
            <a href="#" class="block hover:text-violet-dark text-violet-middle font-medium">
                <div class="flex items-center space-x-2">
                    <img class="w-12 h-12 rounded-full" src="https://picsum.photos/32/32/?random" alt="">
                    <div class="space-y-1">
                        <p class="text-xs">Wahyu dan 30 orang lainnya mengikuti lomba anda</p>
                        <p class="text-xs text-green-dark font-bold">16 jam yang lalu</p>
                    </div>
                </div>
            </a>
            <a href="#" class="block hover:text-violet-dark text-violet-middle font-medium">
                <div class="flex items-center space-x-2">
                    <img class="w-12 h-12 rounded-full" src="https://picsum.photos/32/32/?random" alt="">
                    <div class="space-y-1">
                        <p class="text-xs">Wahyu dan 30 orang lainnya mengikuti lomba anda</p>
                        <p class="text-xs text-green-dark font-bold">16 jam yang lalu</p>
                    </div>
                </div>
            </a>
            <hr>
            <div class="text-center">
                <a href="{{ route('notifications') }}" class="block hover:text-green-dark text-violet-middle font-medium">Lihat Semua</a>
            </div>
        </div>
    </span>
</div>
