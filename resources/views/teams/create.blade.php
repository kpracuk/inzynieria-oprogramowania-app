<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dodaj zespół
        </h2>
    </x-slot>

    <x-card>
        <form method="POST" action="{{ route('teams.store') }}">
            <x-validation-errors class="mb-4" :errors="$errors" />

            @csrf

            <div class="flex flex-wrap gap-y-2 -mx-2">
                <div class="px-2 w-full">
                    <x-label for="name" :value="__('Nazwa')" />
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                </div>

                <div class="px-2 w-full">
                    <x-label for="department" :value="__('Dział')" />
                    <x-input id="department" class="block mt-1 w-full" type="text" name="department" :value="old('department')" required />
                </div>

                <div class="w-full px-2 mt-4">
                    <x-button class="w-full justify-center">
                        {{ __('Dodaj zespół') }}
                    </x-button>
                </div>
            </div>
        </form>
    </x-card>
</x-app-layout>
