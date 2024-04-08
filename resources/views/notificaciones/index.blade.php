<x-app-layout>

    <div class="isolate bg-white px-5 py-7 sm:py-5 lg:px-12">
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Notificaciones</h2>

        </div>
        @forelse ($notificaciones as $notificacion)
        <div class="mx-auto mt-16 max-w-xl sm:mt-20">

            <ul class="max-w-md divide-y divide-gray-200 dark:divide-gray-700">
                <li class="pb-6 sm:pb-6">
                    <div class="flex items-center space-x-6 rtl:space-x-reverse">

                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                {{ $notificacion->data['nombre_vacante'] }}
                            </p>
                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                {{ $notificacion->created_at->diffForHumans(null, false, false, 3) }}
                            </p>
                        </div>
                        <a href="{{ route('candidatos.index',$vacante->id) }}" class="inline-flex items-center px-4 py-2 bg-yellow-600
              dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase
              tracking-widest hover:bg-yellow-700 dark:hover:bg-white focus:bg-yellow-700 dark:focus:bg-white active:bg-indigo-900
              dark:active:bg-indigo-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2
              dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                            Ver candidatos
                        </a>
                    </div>

                </li>

            </ul>


        </div>



        @empty
        <div class="isolate bg-white px-5 py-7 sm:py-5 lg:px-12">
            <div class="mx-auto max-w-2xl text-center">
                <div id="alert-additional-content-1"
                    class="p-4 mb-4 text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800"
                    role="alert">
                    <div class="flex items-center">
                        <svg class="flex-shrink-0 w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">alert</span>
                        <h3 class="text-lg font-medium">Sin notificaciones</h3>
                    </div>
                    <div class="mt-2 mb-4 text-sm">
                       Todas las notificaciones estan leidas.
                    </div>
                    <div class="flex">
                        
                        <button type="button"
                            class="text-blue-800 bg-transparent border border-blue-800 hover:bg-blue-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-200 font-medium rounded-lg text-xs px-3 py-1.5 text-center dark:hover:bg-blue-600 dark:border-blue-600 dark:text-blue-400 dark:hover:text-white dark:focus:ring-blue-800"
                            data-dismiss-target="#alert-additional-content-1" aria-label="Close">
                            Estás al día..
                        </button>
                    </div>
                </div>
            </div>
        </div>



        @endforelse
    </div>



</x-app-layout>