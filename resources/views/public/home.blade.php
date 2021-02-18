@extends('layouts.frontend')

@section('title')
    Lombaku - Beranda
@endsection

@section('content')
<main class="mt-8 lg:mt-4">
    <div class="flex flex-col-reverse lg:flex-row justify-between items-center">
        <div>
            <h1 class="font-dosis font-bold text-4xl text-center lg:text-left lg:text-6xl text-green-dark">
                Be a Winner Right Now
            </h1>
            <h2 class="mt-5 font-dosis font-semibold text-xl text-center lg:text-left lg:text-2xl text-violet-dark">Cari lomba yang cocok untukmu sekarang!</h2>
            <div class="mt-12 relative h-auto w-auto rounded-lg overflow-hidden shadow-xl">
                <input type="text" class="w-11/12 py-2 lg:py-5 px-3 border border-violet-middle focus:outline-none font-montserrat text-md lg:text-lg rounded-lg" placeholder="Cari Lomba..."/>
                <div class="bg-green-dark w-16 h-24 lg:w-24 lg:h-24 absolute top-0 right-0"></div>
                <span class="absolute top-3 right-5 lg:top-4 lg:right-7">
                    <svg class="w-6 h-6 lg:w-10 lg:h-10" viewBox="0 0 40 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="16.9927" cy="16.72" r="13.3352" stroke="#E7FBF1" stroke-width="5.55632"/>
                        <rect x="26.3821" y="21.666" width="17.6661" height="6.01825" rx="3.00913" transform="rotate(39.5699 26.3821 21.666)"fill="#E7FBF1"/>
                    </svg>
                </span>
            </div>

            <div class="flex flex-wrap items-center mt-12 text-violet-middle text-xs lg:text-sm font-montserrat space-x-1 space-y-1 lg:space-y-0 lg:space-x-3">
                <span>Populer :</span>
                <span class="bg-green-light px-4 py-1 rounded-md">Programming</span>
                <span class="bg-green-light px-4 py-1 rounded-md">Gaming</span>
                <span class="bg-green-light px-4 py-1 rounded-md">Desain</span>
            </div>
        </div>
        <div>
            <lottie-player autoplay loop mode="normal" src="{{ asset('asset/lottie/hero-section.json') }}" class="w-80 lg:w-110">
            </lottie-player>
        </div>
    </div>

    <!-- START POPULAR CATEGORY -->
    <h2 class="text-xl lg:text-2xl font-bold text-violet-middle mt-12 lg:mt-0">
        Kategori Populer
    </h2>
    <div class="grid grid-cols-1 lg:grid-cols-5 space-y-2 lg:space-y-0 lg:space-x-2 mt-8 justify-items-center">
        <div class="w-11/12 h-52 lg:h-72 bg-gray-400 rounded-md"></div>
        <div class="w-11/12 h-52 lg:h-72 bg-gray-400 rounded-md"></div>
        <div class="w-11/12 h-52 lg:h-72 bg-gray-400 rounded-md"></div>
        <div class="w-11/12 h-52 lg:h-72 bg-gray-400 rounded-md"></div>
        <div class="w-11/12 h-52 lg:h-72 bg-gray-400 rounded-md"></div>
    </div>
    <!-- END POPULAR CATEGORY -->

    <!-- START CURRENT EVENT -->
    <h2 class="text-2xl font-bold text-violet-middle mt-12">
        Lomba Terbaru
    </h2>
    <div class="flex mt-8 space-x-12 justify-center">
        <!-- START CARD -->
        <article class="overflow-hidden max-w-xs rounded-lg shadow-lg">
            <a href="{{ route('public.event-detail') }}">
                <img alt="Placeholder" class="block h-auto w-full" src="https://picsum.photos/600/400/?random"/>
            </a>

            <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                <h1 class="text-lg">
                    <a class="no-underline hover:underline text-black" href="#">
                        Article Title
                    </a>
                </h1>
                <p class="text-grey-darker text-sm">11/1/19</p>
            </header>

            <footer class="flex items-center justify-between leading-none p-2 md:p-4">
                <a class="flex items-center no-underline hover:underline text-black" href="#">
                    <img alt="Placeholder" class="block rounded-full" src="https://picsum.photos/32/32/?random"/>
                    <p class="ml-2 text-sm">Author Name</p>
                </a>
                <a class="no-underline text-grey-darker hover:text-red-dark" href="#">
                    <span class="hidden">Like</span>
                    <i>
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/>
                        </svg>
                    </i>
                </a>
            </footer>
        </article>
        <!-- END CARD -->
    </div>
    <!-- END CURRENT EVENT -->
</main>
@endsection

@section('script-below')
<script src="https://unpkg.com/@lottiefiles/lottie-player@0.4.0/dist/lottie-player.js"></script>
@endsection