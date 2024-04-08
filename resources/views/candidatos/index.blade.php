<x-app-layout>

    <div class="isolate bg-white px-3 py-5 sm:py-5 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Candidatos</h2>
            <p class="text-1xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ $vacante->titulo }}</p>

        </div>

    </div>

    <div class="mx-auto mt-16 max-w-xl sm:mt-20">

@if($vacante)
    

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nombre
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Correo
                        </th>


                        <th scope="col" class="px-6 py-3">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($vacante->candidatos as $canditado )
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">

                        <td class="px-6 py-4">
                            {{ $canditado->user->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $canditado->user->email }}
                        </td>
                        <td class="px-6 py-4">

                            <a class="inline-flex items-center px-4 py-2 bg-indigo-600
                        dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase
                        tracking-widest hover:bg-indigo-700 dark:hover:bg-white focus:bg-indigo-700 dark:focus:bg-white active:bg-indigo-900
                        dark:active:bg-indigo-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2
                        dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
                                href="{{ asset('storage/cv/'.$canditado->cv) }}" target="_blank">Descargar</a>

                        </td>

                    </tr>
                    @empty
                   
                    @endforelse
                   
                


                </tbody>
            </table>
        </div>

        <div class="mt-10">
            <a href="{{ route('home') }}"
                class="block w-full rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Regresar</a>
        </div>
    </div>
    @else
    <p>No hav vacantes</p>
    @endif
</x-app-layout>