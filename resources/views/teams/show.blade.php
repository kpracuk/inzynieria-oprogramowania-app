<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Profil zespołu
        </h2>
    </x-slot>

    <x-card>
        <div class="flex text-gray-800 items-center justify-between">
            <div class="flex">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                <div class="flex flex-col pl-4">
                    <h1 class="text-2xl font-semibold">{{ $team->name }}</h1>
                    @if(count($team->users) === 1)
                        <span class="text-md font-black text-gray-500">{{ count($team->users) }} członek</span>
                    @else
                        <span class="text-md font-black text-gray-500">{{ count($team->users) }} członków</span>
                    @endif
                </div>
            </div>
            <a href="{{ route('messages') }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                </svg>
            </a>
        </div>
        @if(count($team->users))
            <div class="flex flex-col text-gray-800 mt-2">
                <h2 class="flex text-sm font-black text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                    </svg>
                    TEAM LEADER
                </h2>
                <div class="pl-6">
                    <a href="{{ route('users.show', ['user' => $team->teamLeader->id]) }}" class="font-bold text-gray-800">{{ $team->teamLeader->firstname }} {{ $team->teamLeader->lastname }}</a>
                </div>
            </div>
            <div class="flex flex-col text-gray-800 mt-2">
                <h2 class="flex text-sm font-black text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    CZŁONKOWIE ZESPOŁU
                </h2>
                <div class="pl-6 flex flex-col">
                    @foreach($team->users as $user)
                        @if ($loop->first) @continue @endif
                        <a href="{{ route('users.show', ['user' => $user->id]) }}" class="font-bold text-gray-800">{{ $user->firstname }} {{ $user->lastname }}</a>
                    @endforeach
                </div>
            </div>
        @endif
    </x-card>
</x-app-layout>
