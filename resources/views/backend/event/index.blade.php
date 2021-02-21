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
                            <ul class="flex mb-0 list-none flex-wrap pt-3 pb-4 flex-row lg:w-1/2">
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

                        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 rounded">
                            <div class="px-4 py-5 flex-auto">
                                <div class="tab-content tab-space">
                                    <div class="block" id="tab-profile">
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
                                                    <tr class="bg-white hover:bg-green-light py-2">
                                                        <td class="py-4 px-6 border-b border-grey-light">New York</td>
                                                        <td class="py-4 px-6 border-b border-grey-light">
                                                            <span class="px-2">Rp. 100,000</span>
                                                        </td>
                                                        <td class="py-4 px-6 border-b border-grey-light">
                                                            <span class="bg-red-300 px-2 rounded-md text-red-700 font-semibold">Selesai</span>
                                                        </td>
                                                    </tr>
                                                    <tr class="bg-white hover:bg-green-light">
                                                        <td class="py-4 px-6 border-b border-grey-light">New York</td>
                                                        <td class="py-4 px-6 border-b border-grey-light">
                                                            <span class="px-2">Rp. 100,000</span>
                                                        </td>
                                                        <td class="py-4 px-6 border-b border-grey-light">
                                                            <span class="bg-yellow-200 px-2 rounded-md text-yellow-600 font-semibold">Ongoing</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="hidden" id="tab-settings">
                                        <p>
                                            Completely synergize resource taxing relationships via
                                            premier niche markets. Professionally cultivate one-to-one
                                            customer service with robust ideas.
                                            <br />
                                            <br />
                                            Dynamically innovate resource-leveling customer service for
                                            state of the art customer service.
                                        </p>
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
