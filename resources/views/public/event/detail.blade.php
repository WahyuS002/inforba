@extends('layouts.frontend')

@section('title')
    Lombaku - Event Detail
@endsection

@section('content')
<div class="mt-28 lg:px-60">
    <h1 class="font-bold font-dosis text-green-dark text-4xl lg:text-5xl text-center">
        {{ $event->title }}
    </h1>
<h3 class="mt-6 font-semibold font-dosis text-violet-dark text-xl text-center">
    Dibuat Oleh {{ $event->user->name }}
</h3>
    <div class="mt-6 flex flex-col lg:flex-row justify-center space-y-2 lg:space-y-0 lg:space-x-4 font-semibold font-montserrat text-xs lg:text-sm">
        <div class="flex justify-center lg:justify-start items-center space-x-4">
            <span>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M23 11.99L20.56 9.2L20.9 5.51L17.29 4.69L15.4 1.5L12 2.96L8.6 1.5L6.71 4.69L3.1 5.5L3.44 9.2L1 11.99L3.44 14.78L3.1 18.48L6.71 19.3L8.6 22.5L12 21.03L15.4 22.49L17.29 19.3L20.9 18.48L20.56 14.79L23 11.99ZM19.05 13.47L18.49 14.12L18.57 14.97L18.75 16.92L16.85 17.35L16.01 17.54L15.57 18.28L14.58 19.96L12.8 19.19L12 18.85L11.21 19.19L9.43 19.96L8.44 18.29L8 17.55L7.16 17.36L5.26 16.93L5.44 14.97L5.52 14.12L4.96 13.47L3.67 12L4.96 10.52L5.52 9.87L5.43 9.01L5.25 7.07L7.15 6.64L7.99 6.45L8.43 5.71L9.42 4.03L11.2 4.8L12 5.14L12.79 4.8L14.57 4.03L15.56 5.71L16 6.45L16.84 6.64L18.74 7.07L18.56 9.02L18.48 9.87L19.04 10.52L20.33 11.99L19.05 13.47Z" fill="#9898B3"/>
                    <path d="M10.09 13.75L7.77004 11.42L6.29004 12.91L10.09 16.72L17.43 9.35999L15.95 7.87L10.09 13.75Z"
                    fill="#9898B3"/>
                </svg>
            </span>
            <span class="text-violet-light">{{ count($event->users) }} / {{ $event->max_user }}</span>
        </div>
        <div class="flex justify-center lg:justify-start items-center space-x-2">
            <span>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2C9.243 2 7 4.243 7 7C7 9.757 9.243 12 12 12C14.757 12 17 9.757 17 7C17 4.243 14.757 2 12 2ZM12 10C10.346 10 9 8.654 9 7C9 5.346 10.346 4 12 4C13.654 4 15 5.346 15 7C15 8.654 13.654 10 12 10ZM21 21V20C21 16.141 17.859 13 14 13H10C6.14 13 3 16.141 3 20V21H5V20C5 17.243 7.243 15 10 15H14C16.757 15 19 17.243 19 20V21H21Z" fill="#9898B3"/>
                </svg>
            </span>
            <span class="text-violet-light">Individu</span>
        </div>
        <div class="flex justify-center lg:justify-start items-center space-x-2">
            <span>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20.3438 3.75H18.1875V2.8125C18.1875 2.70937 18.1031 2.625 18 2.625H6C5.89687 2.625 5.8125 2.70937 5.8125 2.8125V3.75H3.65625C3.38275 3.75 3.12044 3.85865 2.92705 4.05205C2.73365 4.24544 2.625 4.50775 2.625 4.78125V8.25C2.625 10.1648 4.03125 11.7563 5.86406 12.0469C6.22734 14.7703 8.41406 16.9148 11.1562 17.2148V19.6805H6.5625C6.14766 19.6805 5.8125 20.0156 5.8125 20.4305V21.1875C5.8125 21.2906 5.89687 21.375 6 21.375H18C18.1031 21.375 18.1875 21.2906 18.1875 21.1875V20.4305C18.1875 20.0156 17.8523 19.6805 17.4375 19.6805H12.8438V17.2148C15.5859 16.9148 17.7727 14.7703 18.1359 12.0469C19.9688 11.7563 21.375 10.1648 21.375 8.25V4.78125C21.375 4.50775 21.2663 4.24544 21.073 4.05205C20.8796 3.85865 20.6173 3.75 20.3438 3.75ZM4.3125 8.25V5.4375H5.8125V10.3031C5.37714 10.1641 4.99723 9.89025 4.72762 9.52122C4.45801 9.15219 4.31264 8.70703 4.3125 8.25ZM16.5 11.25C16.5 12.4008 16.0523 13.4859 15.2367 14.2992C14.4211 15.1148 13.3383 15.5625 12.1875 15.5625H11.8125C10.6617 15.5625 9.57656 15.1148 8.76328 14.2992C7.94766 13.4836 7.5 12.4008 7.5 11.25V4.3125H16.5V11.25ZM19.6875 8.25C19.6875 9.21094 19.057 10.0266 18.1875 10.3031V5.4375H19.6875V8.25Z"
                    fill="#9898B3"/>
                </svg>
            </span>
            <span class="text-violet-light">Rp. {{ ($event->total_prize > 1000) ? $event->total_prize / 1000 . 'K' :  $event->total_prize}}</span>
        </div>
        <div class="flex justify-center lg:justify-start items-center space-x-2 px-2 rounded-sm">
            <div class="flex space-x-2 px-2 py-1  rounded-sm bg-red-light">
                <span>
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.00008 1.33333C11.6761 1.33333 14.6667 4.324 14.6667 8C14.6667 11.676 11.6761 14.6667 8.00008 14.6667C4.32408 14.6667 1.33341 11.676 1.33341 8C1.33341 4.324 4.32408 1.33333 8.00008 1.33333ZM8.00008 13.3333C10.9407 13.3333 13.3334 10.9407 13.3334 8C13.3334 5.05933 10.9407 2.66666 8.00008 2.66666C5.05941 2.66666 2.66675 5.05933 2.66675 8C2.66675 10.9407 5.05941 13.3333 8.00008 13.3333Z" fill="#FF6B72"/>
                        <path d="M7.33341 4.66667H8.66675V8.27601L6.47141 10.4713L5.52875 9.52867L7.33341 7.72401V4.66667Z" fill="#FF6B72"/>
                    </svg>
                </span>
                <span class="text-red-dark text-xs">{{ \Carbon\Carbon::parse($event->closed_at)->diffForHumans() }}</span>
            </div>
        </div>
    </div>
</div>
<!-- START CARD SECTION -->
<div class="mt-12 flex flex-col lg:flex-row space-y-6 lg:space-y-0 lg:space-x-12">
    <div class="w-full lg:w-3/5 border border-violet-light rounded-md">
        <img alt="Placeholder" class="block h-auto w-full p-3 object-cover rounded-md" src="{{ asset('storage/' . $event->thumbnail) }}"/>
    </div>
    <div class="w-full lg:w-2/5 p-3 border border-violet-light rounded-md">
        <div class="text-center mb-8">
            <span class="text-2xl text-violet-middle font-bold">Timeline</span>
        </div>

        <div class="space-y-3 overflow-auto h-80">
            @foreach ($event->timelines as $item)
            <div class="flex items-center border border-violet-light rounded-md">
                <div class="flex flex-col items-center font-montserrat p-3">
                    <div class="rounded-full border border-green-dark w-10 h-10 bg-green-light flex items-center justify-center">
                        <p class="text-green-dark font-bold text-md">{{ \Carbon\Carbon::parse($item->timeline)->format('d') }}</p>
                    </div>
                    <p class="text-green-dark font-medium text-md">{{ \Carbon\Carbon::parse($item->timeline)->format('M') }}</p>
                </div>
                <span class="font-semibold text-lg text-violet-light">Launching Re-Cloud Challenges Indonesia</span>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- END CARD SECTION -->
<div class="mt-12">
    <h4 class="font-montserrat font-bold text-xl lg:text-2xl text-violet-middle">Deskripsi</h4>
    <div class="mt-4">
        <span class="font-semibold text-violet-light">{{ $event->desc }}</span>
    </div>
</div>

<div class="text-center mt-8">
    <button class="bg-green-dark px-3 rounded-md py-1 text-white text-lg hover:bg-green-600 font-semibold">
        <a href="{{ route('app.event.registration', $event->slug) }}">Daftar Sekarang</a>
    </button>
</div>

@endsection