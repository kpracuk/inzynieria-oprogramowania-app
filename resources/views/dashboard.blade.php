<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form class="flex justify-end sm:px-6 lg:px-8" action="{{ route('dashboard') }}">
                <x-input id="search" class="block mr-2" type="text" name="search" :value="old('search')" placeholder="Imię, Nazwisko, Zespół..." value="{{ request()->get('search') }}" />
                <x-button class="py-0">
                    {{ __('Szukaj') }}
                </x-button>
            </form>
            @foreach($items->take(8) as $item)
                <x-card :size="'xlarge'">
                    <div class="flex text-gray-800 items-center">
                        @if($item instanceof \App\Models\User)
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        @endif
                        @if($item instanceof \App\Models\Team)
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        @endif
                        <div class="flex flex-col pl-4">
                            @if($item instanceof \App\Models\User)
                                <a href="{{ route('users.show', ['user' => $item->id]) }}" class="text-2xl font-semibold">{{ $item->firstname }} {{ $item->lastname }}</a>
                                <span class="text-md font-black text-gray-500">{{ $item->position }}</span>
                            @endif
                            @if($item instanceof \App\Models\Team)
                                <a href="{{ route('teams.show', ['team' => $item->id]) }}" class="text-2xl font-semibold">{{ $item->name }}</a>
                                <span class="text-md font-black text-gray-500">{{ count($item->users) }} członków</span>
                            @endif
                        </div>
                    </div>
                    <div class="flex flex-col text-gray-800 mt-2">
                        @if($item instanceof \App\Models\User)
                            <span class="font-bold text-gray-800">{{ $item->phone }}</span>
                            <span class="font-bold text-gray-800">{{ $item->email }}</span>
                        @endif
                        @if($item instanceof \App\Models\Team)
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                </svg>
                                <a href="{{ route('users.show', ['user' => $item->teamLeader->id]) }}" class="font-bold text-gray-800">{{ $item->teamLeader->firstname }} {{ $item->teamLeader->lastname }}</a>
                            </div>
                            <div class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 mt-px" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <div class="flex flex-wrap font-bold text-gray-800">
                                    @foreach($item->users as $user)
                                        @if ($loop->first) @continue @endif
                                        <a href="{{ route('users.show', ['user' => $user->id]) }}" class="mr-4 whitespace-nowrap">{{ $user->firstname }} {{ $user->lastname }}</a>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </x-card>
            @endforeach
        </div>
    </div>
</x-app-layout>
