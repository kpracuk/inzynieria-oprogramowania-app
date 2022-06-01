<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Profil użytkownika
        </h2>
    </x-slot>

    @if(session()->has('password'))
        <div class="bg-green-700 text-white p-4 shadow-lg absolute bottom-0 w-full">
            Pomyślnie utworzono użytkownika! Jego tymczasowe hasło to: <span class="font-bold">{{ session()->get('password') }}</span>
        </div>
    @endif

    <x-card>
        <div class="flex text-gray-800 items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <div class="flex flex-col pl-4">
                <h1 class="text-2xl font-semibold">{{ $user->firstname }} {{ $user->lastname }}</h1>
                <span class="text-md font-black text-gray-500">{{ $user->position }}</span>
            </div>
        </div>
        @if($user->team)
            <a href="{{ route('teams.show', ['team' => $user->team->id]) }}" class="text-lg font-black text-gray-500">{{ $user->team->name }}</a>
        @endif
        <div class="flex flex-col text-gray-800 mt-2">
            <h2 class="text-sm font-black text-gray-500">KONTAKT SŁUŻBOWY</h2>
            <span class="font-bold text-gray-800">{{ $user->email }}</span>
            <span class="font-bold text-gray-800">{{ $user->phone }}</span>
        </div>
        @if(Auth::user()->is_admin || $user->id === Auth::id())
            <div class="flex flex-col text-gray-800 mt-2">
                <h2 class="text-sm font-black text-gray-500">DANE PRYWATNE</h2>
                <span class="font-bold text-gray-800">{{ $user->private_email }}</span>
                <span class="font-bold text-gray-800">{{ $user->private_phone }}</span>
                <span class="font-bold text-gray-800">{{ $user->address }}</span>
            </div>
            <div class="flex flex-col text-gray-800 mt-2">
                <h2 class="text-sm font-black text-gray-500">DANE ADMINISTRACYJNE</h2>
                <div>
                    <span class="font-semibold text-gray-800">Data zatrudnienia:</span>
                    <span class="font-black text-gray-800">{{ $user->hired_at }}</span>
                </div>
                <div>
                    <span class="font-semibold text-gray-800">Wynagrodzenie:</span>
                    <span class="font-black text-gray-800">{{ $user->salary }} PLN</span>
                </div>
                <div>
                    <span class="font-semibold text-gray-800">Dostępny urlop:</span>
                    @if($user->available_time_off === 1)
                        <span class="font-black text-gray-800">{{ $user->available_time_off }} dzień</span>
                    @else
                        <span class="font-black text-gray-800">{{ $user->available_time_off }} dni</span>
                    @endif
                </div>
            </div>
        @endif
    </x-card>
</x-app-layout>
