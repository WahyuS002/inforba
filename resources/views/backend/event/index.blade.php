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

                        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
                            <div class="px-4 py-5 flex-auto">
                                <div class="tab-content tab-space">
                                    <div class="block" id="tab-profile">
                                        <p>
                                            Collaboratively administrate empowered markets via
                                            plug-and-play networks. Dynamically procrastinate B2C users
                                            after installed base benefits.
                                            <br />
                                            <br />
                                            Dramatically visualize customer directed convergence
                                            without revolutionary ROI.
                                        </p>
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
                aElements[i].classList.remove("bg-pink-600");
                aElements[i].classList.add("text-pink-600");
                aElements[i].classList.add("bg-white");
                tabContents[i].classList.add("hidden");
                tabContents[i].classList.remove("block");
            }
            element.classList.remove("text-pink-600");
            element.classList.remove("bg-white");
            element.classList.add("text-white");
            element.classList.add("bg-pink-600");
            document.getElementById(tabID).classList.remove("hidden");
            document.getElementById(tabID).classList.add("block");
        }
    </script>
</x-app-layout>
