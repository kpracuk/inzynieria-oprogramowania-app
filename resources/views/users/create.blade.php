<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dodaj użytkownika
        </h2>
    </x-slot>

    <x-card :size="'large'">
        <form method="POST" action="{{ route('users.store') }}">
            <x-validation-errors class="mb-4" :errors="$errors" />

            @csrf

            <div class="flex flex-wrap gap-y-2 -mx-2">
                <div class="px-2 w-full md:w-1/2">
                    <x-label for="firstname" :value="__('Imię')" />
                    <x-input id="firstname" class="block mt-1 w-full" type="text" name="firstname" :value="old('firstname')" required autofocus />
                </div>

                <div class="px-2 w-full md:w-1/2">
                    <x-label for="lastname" :value="__('Nazwisko')" />
                    <x-input id="lastname" class="block mt-1 w-full" type="text" name="lastname" :value="old('lastname')" required />
                </div>

                <div class="px-2 w-full md:w-1/2">
                    <x-label for="email" :value="__('Email')" />
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                </div>

                <div class="px-2 w-full md:w-1/2">
                    <x-label for="private_email" :value="__('Prywatny Email')" />
                    <x-input id="private_email" class="block mt-1 w-full" type="email" name="private_email" :value="old('private_email')" required />
                </div>

                <div class="px-2 w-full md:w-1/2">
                    <x-label for="phone" :value="__('Telefon')" />
                    <x-input id="phone" class="block mt-1 w-full" type="tel" name="phone" :value="old('phone')" required />
                </div>

                <div class="px-2 w-full md:w-1/2">
                    <x-label for="private_phone" :value="__('Prywatny Telefon')" />
                    <x-input id="private_phone" class="block mt-1 w-full" type="tel" name="private_phone" :value="old('private_phone')" required />
                </div>

                <div class="px-2 w-full">
                    <x-label for="address" :value="__('Adres')" />
                    <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required />
                </div>

                <div class="px-2 w-full md:w-1/2">
                    <x-label for="team_id" :value="__('Zespół')" />
                    <x-select :items="$teams" id="team_id" class="block mt-1 w-full" type="text" name="team_id" :value="old('team_id')" required />
                </div>

                <div class="px-2 w-full md:w-1/2">
                    <x-label for="position" :value="__('Stanowisko')" />
                    <x-input id="position" class="block mt-1 w-full" type="text" name="position" :value="old('position')" required />
                </div>

                <div class="px-2 w-full md:w-1/3">
                    <x-label for="hired_at" :value="__('Data zatrudnienia')" />
                    <x-input id="hired_at" class="block mt-1 w-full" type="date" name="hired_at" :value="old('hired_at')" required />
                </div>

                <div class="px-2 w-full md:w-1/3">
                    <x-label for="salary" :value="__('Wynagrodzenie (brutto)')" />
                    <x-input id="salary" class="block mt-1 w-full" type="number" name="salary" :value="old('salary')" required />
                </div>

                <div class="px-2 w-full md:w-1/3">
                    <x-label for="available_time_off" :value="__('Dostępne dni urlopu')" />
                    <x-input id="available_time_off" class="block mt-1 w-full" type="number" name="available_time_off" :value="old('available_time_off')" required />
                </div>

                <div class="w-full px-2 mt-4">
                    <x-button class="w-full justify-center">
                        {{ __('Dodaj pracownika') }}
                    </x-button>
                </div>
            </div>
        </form>
    </x-card>
</x-app-layout>
