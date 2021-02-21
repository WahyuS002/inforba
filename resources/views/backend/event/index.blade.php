<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Beranda') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-12">
                <div class="flex flex-wrap" id="tabs-id">
                    <div class="w-full">
                        <div class="flex justify-between items-center">
                            <ul class="flex mb-0 list-none flex-wrap pt-3 pb-4 flex-row lg:w-1/2 space-y-3 lg:space-y-0">
                                <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
                                    <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-white bg-green-dark" onclick="changeAtiveTab(event,'tab-profile')">
                                        <i class="fas fa-space-shuttle text-base mr-1"></i>  Lomba yang diikuti
                                    </a>
                                </li>
                                <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
                                    <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-violet-middle bg-white" onclick="changeAtiveTab(event,'tab-settings')">
                                        <i class="fas fa-cog text-base mr-1"></i>  Lomba yang dibuat
                                    </a>
                                </li>
                            </ul>
                            <a href="{{ route('app.event.create') }}">
                                <span>
                                    <svg class="stroke-current text-green-dark" width="28" height="28" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </span>
                            </a>
                        </div>

                        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 rounded overflow-auto lg:overflow-hidden">
                            <div class="px-4 py-5 flex-auto">
                                <div class="tab-content tab-space">
                                    <div class="block" id="tab-profile">
                                        <!-- component -->
                                        <div class="bg-gray-100 w-96 md:w-full lg:w-full px-3 rounded">
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

                                    <div class="hidden" id="tab-settings">
                                        <div class="flex flex-wrap">
                                            @foreach ($event as $e)
                                            <article class="m-5 overflow-hidden max-w-xs rounded-lg shadow-lg">
                                                <a href="{{ route('public.event-detail', $e->slug) }}">
                                                    <img alt="Placeholder" class="block h-auto w-full" src="{{ asset('storage/' . $e->thumbnail ) }}"/>
                                                </a>

                                                <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                                                    <h1 class="text-lg">
                                                        <a class="no-underline hover:underline text-black" href="#">
                                                            {{ $e->title }}
                                                        </a>
                                                    </h1>
                                                    <p class="text-grey-darker text-sm"> {{ \Carbon\Carbon::parse($e->closed_at)->diffForHumans()}} </p>
                                                </header>

                                                <footer class="flex items-center justify-between leading-none p-2 md:p-4">
                                                    <a class="flex items-center no-underline hover:underline text-black" href="#">
                                                        <img alt="Placeholder" class="block rounded-full" src="https://picsum.photos/32/32/?random"/>
                                                        <p class="ml-2 text-sm">{{ $e->user->name }}</p>
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
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function changeAtiveTab(event,tabID){
            let element = event.target;
            while(element.nodeName !== "A"){
                element = element.parentNode;
            }
            ulElement = element.parentNode.parentNode;
            aElements = ulElement.querySelectorAll("li > a");
            tabContents = document.getElementById("tabs-id").querySelectorAll(".tab-content > div");
            for(let i = 0 ; i < aElements.length; i++){
                aElements[i].classList.remove("text-white");
                aElements[i].classList.remove("bg-green-dark");
                aElements[i].classList.add("text-violet-middle");
                aElements[i].classList.add("bg-white");
                tabContents[i].classList.add("hidden");
                tabContents[i].classList.remove("block");
            }
            element.classList.remove("text-violet-middle");
            element.classList.remove("bg-white");
            element.classList.add("text-white");
            element.classList.add("bg-green-dark");
            document.getElementById(tabID).classList.remove("hidden");
            document.getElementById(tabID).classList.add("block");
        }
    </script>
</x-app-layout>
