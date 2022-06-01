<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Wiadomości') }}
        </h2>
    </x-slot>

    <div class="w-full flex gap-x-4 justify-self-stretch items-stretch max-w-7xl mx-auto sm:px-6 lg:px-8 py-4">
        <div class="flex flex-col bg-white rounded shadow-md w-[360px] p-4">
            @for($i = 0; $i < 3; $i++)
                <div class="w-full p-2 rounded shadow-sm border-gray-200 border h-20 mb-2">
                    <div class="flex items-center gap-x-4 text-gray-800 font-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="text-lg flex-grow">
                            Jan Nowak
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 self-start" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 11l3-3m0 0l3 3m-3-3v8m0-13a9 9 0 110 18 9 9 0 010-18z" />
                        </svg>
                    </div>
                    <div class="mt-2 px-1 text-gray-500 font-bold overflow-ellipsis overflow-hidden whitespace-nowrap">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    </div>
                </div>
            @endfor
        </div>
        <div class="flex flex-col flex-grow bg-white rounded shadow-md">
            <div class="flex flex-col flex-grow p-4 items-start">
                <div class="flex flex-col bg-gray-300 rounded shadow p-3 flex-shrink max-w-[75%] mb-2">
                    <div class="text-gray-800 font-bold">Lorem ipsum dolor sit amet.</div>
                    <div class="text-gray-500 font-bold text-right text-sm">15:12</div>
                </div>
                <div class="flex flex-col bg-gray-300 rounded shadow p-3 flex-shrink max-w-[75%] mb-2">
                    <div class="text-gray-800 font-bold">Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consectetur adipisicing.</div>
                    <div class="text-gray-500 font-bold text-right text-sm">15:13</div>
                </div>
                <div class="flex flex-col bg-indigo-400 rounded shadow p-3 flex-shrink max-w-[75%] mb-2 mt-4 self-end">
                    <div class="text-white font-bold">Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consectetur adipisicing.</div>
                    <div class="text-gray-200 font-bold text-right text-sm">15:13</div>
                </div>
            </div>
            <hr>
            <div class="flex gap-x-2 p-4">
                <x-input id="message" class="flex-grow block mr-2" type="text" name="message" placeholder="Treść wiadomości" />
                <x-button class="py-0">
                    Wyślij
                </x-button>
            </div>
        </div>
    </div>
</x-app-layout>
