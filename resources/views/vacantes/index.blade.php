<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mis vacantes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(@session()->has('mensaje'))

            <div class="font-regular relative block w-full rounded-lg bg-green-500 p-4 text-base leading-5 text-white opacity-100">
                {{session('mensaje'); }}
              </div>
           


            @endif


            <livewire:mostrar-vacantes>

        </div>
    </div>
</x-app-layout>