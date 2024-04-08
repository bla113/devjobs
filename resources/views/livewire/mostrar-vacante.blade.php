<div class="bg-white py-24 sm:py-32">
  
  <div class="mx-auto grid max-w-7xl gap-x-8 gap-y-20 px-6 lg:px-8 xl:grid-cols-3">
    <div class="max-w-2xl">
      <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ $vacante->titulo }}</h2>
      <p class="mt-6 text-lg leading-8 text-gray-600">{{ $vacante->descripcion }}</p>
    </div>
    <ul role="list" class="grid gap-x-8 gap-y-12 sm:grid-cols-2 sm:gap-y-16 xl:col-span-2">
      <li>
        <div class="flex items-center gap-x-6">
          <div
            class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-90">
            <img src="{{ asset('storage/vacantes/'.$vacante->imagen) }}" alt="Front of men&#039;s Basic Tee in black."
              class="h-full w-full object-cover object-center lg:h-full lg:w-full">
          </div>
          <div>
            <h3 class="text-base font-semibold leading-7 tracking-tight text-gray-900">{{ $vacante->empresa }}</h3>
            <p class="text-sm font-semibold leading-6 text-indigo-600">{{ $vacante->categoria->categoria }}/ {{
              $vacante->salario->salario}}</p>
            <span class="inline-flex items-center px-4 py-2 bg-yellow-600
              dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase
              tracking-widest hover:bg-yellow-700 dark:hover:bg-white focus:bg-yellow-700 dark:focus:bg-white active:bg-indigo-900
              dark:active:bg-indigo-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2
              dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
              ÚLTIMO DÍA PARA POSTULARSE: {{
              Carbon\Carbon::parse($vacante->ultimo_dia)->format('m/d/Y') }}</span>
            @guest
            <p class="mt-6 text-xs leading-5 text-red-600">Debes iniciar sesión para poder postularte <a
                href="{{ route('login') }}" class="font-bold text-indigo-600 ">Ingresar</a></p>
            @endguest

          </div>

        </div>
        @auth

        @can('create', App\Models\Vacante::class)
        <p>Este es un reclutador</p>
        @else
        <h3 class="uppercase text-2xl font-bold text-blue-500">Postularme para esta vacante</h3>
        <livewire:postular-vacante :vacante="$vacante">
          
          @endcan

          @endauth
      </li>

      
  </div>
  </ul>

</div>


@if (session()->has('mensaje'))




@endif



</div>