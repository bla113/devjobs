<div>
    <form action="#" method="POST" class="mx-auto mt-16 max-w-xl sm:mt-20" wire:submit.prevent='buscarVacante'>


        <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">

          
            <div>
                <div class="sm:col-span-2">
                    <label for="phone-number"
                        class="uppercase block text-sm font-semibold leading-6 text-gray-900">Categoria</label>
                    <div class="relative mt-2.5">
                        <select id="salario" wire:model="categoria"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm shadow-blue-500 ring-1 ring-inset ring-blue-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-400 sm:text-sm sm:leading-6">
                            <option>--Seleccione una opción</option>
                            @foreach ($categorias as $categoria)
                            
                            <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>

                                @endforeach




                        </select>


                    </div>
                </div>
            </div>
            <div>
                <div class="sm:col-span-2">
                    <label for="phone-number"
                        class="uppercase block text-sm font-semibold leading-6 text-gray-900">Rango de salario</label>
                    <div class="relative mt-2.5">
                        <select id="salario" wire:model="salario"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm shadow-blue-500 ring-1 ring-inset ring-blue-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-400 sm:text-sm sm:leading-6">

                            <option>--Seleccione una opción</option>
                            @foreach ($salarios as $salario)
                            <option value="{{ $salario->id }}">{{ $salario->salario }}</option>
                          
                                @endforeach

                        </select>


                    </div>
                </div>
            </div>


        </div>
        <div class="mt-10">
            <button type="submit"
                class="block w-full rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Buscar
                Vacante</button>
        </div>
    </form>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <ul role="list" class="divide-y divide-gray-100">
            @foreach ($vacantes as $vacante)


            <li class="flex justify-between gap-x-6 py-5">
                <div class="flex min-w-0 gap-x-4">
                    <img class="h-12 w-12 flex-none rounded-full bg-gray-50"
                        src="{{ asset('storage/vacantes/'.$vacante->imagen) }}" alt="">
                    <div class="min-w-0 flex-auto">
                        <p class="text-sm font-semibold leading-6 text-gray-900">{{ $vacante->titulo }}</p>
                        <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{
                            Carbon\Carbon::parse($vacante->ultimo_dia)->format('m/d/Y') }}
                        </p>
                    </div>
                </div>
                <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                    <p class="text-sm leading-6 text-gray-900">{{ $vacante->categoria->categoria }}</p>
                    <p class="mt-1 text-xs leading-5 text-indigo-500">{{ $vacante->salario->salario }}

                        @if(auth()->user()->rol == 2)
                        <a href="{{ route('candidatos.index',$vacante->id) }}" class="inline-flex items-center px-4 py-2 bg-indigo-600
                            dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase
                            tracking-widest hover:bg-indigo-700 dark:hover:bg-white focus:bg-indigo-700 dark:focus:bg-white active:bg-indigo-900
                            dark:active:bg-indigo-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2
                            dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Candidatos</a>
                       
                       @else
                       <a href="{{ route('vacantes.show',$vacante->id) }}" class="inline-flex items-center px-4 py-2 bg-indigo-600
                        dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase
                        tracking-widest hover:bg-indigo-700 dark:hover:bg-white focus:bg-indigo-700 dark:focus:bg-white active:bg-indigo-900
                        dark:active:bg-indigo-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2
                        dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Aplicar</a>
                            @endif
                      
                    
                    
                    </p>
                </div>
            </li>


            @endforeach

        </ul>
      <div class="mt-5 pt-7 mb-1 p-5">
            {{ $vacantes->links() }}
        </div> 

    </div>
</div>