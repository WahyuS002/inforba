<div>
    <input class="w-full rounded-lg border-2 border-violet-middle px-5 py-1 focus:outline-none font-montserrat text-violet-middle" placeholder="Cari Lomba..." type="text" wire:model="query">
    @if ($query && count($events) > 0)
    <div class="absolute bg-gray-50 w-full h-auto rounded-lg font-montserrat px-6 py-2 space-y-3 mt-3 border border-violet-dark z-10">
        @foreach ($events as $item)
        <a href="{{ route('public.event-detail', $item['slug']) }}" class="flex justify-between font-medium hover:text-green-dark">
            <p class="text-sm">{{ $item['title'] }}</p>
            <div class="flex items-center space-x-2">
                <span>
                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11 1.5H10V1C9.99974 0.734865 9.89429 0.480665 9.70681 0.293186C9.51934 0.105707 9.26514 0.000264738 9 0H3C2.73486 0.000264738 2.48066 0.105707 2.29319 0.293186C2.10571 0.480665 2.00026 0.734865 2 1V1.5H1C0.734865 1.50026 0.480665 1.60571 0.293186 1.79319C0.105707 1.98066 0.000264738 2.23486 0 2.5V4C0.000661548 4.53023 0.211588 5.03855 0.586517 5.41348C0.961447 5.78841 1.46977 5.99934 2 6H2.161C2.36935 6.76536 2.79605 7.45349 3.38899 7.98037C3.98193 8.50725 4.71546 8.85008 5.5 8.967V11H3V12H9V11H6.5V8.9655C7.29473 8.86725 8.0414 8.53174 8.64256 8.00273C9.24373 7.47372 9.67148 6.77578 9.87 6H10C10.5302 5.99934 11.0386 5.78841 11.4135 5.41348C11.7884 5.03855 11.9993 4.53023 12 4V2.5C11.9997 2.23486 11.8943 1.98066 11.7068 1.79319C11.5193 1.60571 11.2651 1.50026 11 1.5V1.5ZM2 5C1.73486 4.99974 1.48066 4.89429 1.29319 4.70681C1.10571 4.51934 1.00026 4.26514 1 4V2.5H2V5ZM11 4C10.9997 4.26514 10.8943 4.51934 10.7068 4.70681C10.5193 4.89429 10.2651 4.99974 10 5V2.5H11V4Z" fill="#1DBF73"/>
                    </svg>
                </span>
                <p class="text-sm text-green-dark font-semibold">{{ number_format($item['total_prize']) }}</p>
            </div>
        </a>
        @endforeach

    </div>
    @endif

</div>