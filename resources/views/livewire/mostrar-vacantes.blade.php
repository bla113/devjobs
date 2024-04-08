<div class="bg-white py-24 sm:py-32">
    <div class="mx-auto grid max-w-7xl gap-x-8 gap-y-20 px-6 lg:px-8 xl:grid-cols-3">
        <div class="max-w-2xl">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                Vacantes</h2>
            <p class="mt-6 text-lg leading-8 text-gray-600">Puede administrar sus vacantes en esta sección</p>
        </div>
        @if($vacantes)
        <ul role="list" class="grid gap-x-8 gap-y-12 sm:grid-cols-2 sm:gap-y-16 xl:col-span-2">





            @foreach ($vacantes as $vacante )


            <li>
                <div class="flex items-center gap-x-6">
                    <img class="h-20 w-20 rounded"
                    src="{{ asset('storage/vacantes/'.$vacante->imagen) }}"
                        alt="">
                    <div>
                        <h3 class="text-base font-semibold leading-7 tracking-tight text-gray-900"> <a href="{{ route('vacantes.show',$vacante->id)}}">{{ $vacante->titulo
                        }}</a></h3>
                        <h2 class="text-base font-semibold leading-7 tracking-tight text-gray-900">Categoría: {{
                            $vacante->categoria->categoria }}</h2>
                        <h2 class="text-base font-semibold leading-7 tracking-tight text-gray-900">Salario: {{
                            $vacante->salario->salario }}</h2>
                        <p class="text-sm font-semibold leading-6 text-indigo-600">Último día: {{
                            Carbon\Carbon::parse($vacante->ultimo_dia)->format('m/d/Y') }} </p>

                    </div>

                </div>


                <a href="#" class="inline-flex items-center px-4 py-2 bg-indigo-600
        dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase
        tracking-widest hover:bg-indigo-700 dark:hover:bg-white focus:bg-indigo-700 dark:focus:bg-white active:bg-indigo-900
        dark:active:bg-indigo-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2
        dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                    Candidatos</a>
                <a href="{{ route('vacantes.edit', $vacante->id) }}" class="inline-flex items-center px-4 py-2 bg-yellow-600
        dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase
        tracking-widest hover:bg-yellow-700 dark:hover:bg-white focus:bg-yellow-700 dark:focus:bg-white active:bg-indigo-900
        dark:active:bg-indigo-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2
        dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Editar</a>
        
                <button type="button"
                wire:click="eliminarVacante({{ $vacante->id }})"
                wire:confirm="Está seguro que desea eliminar la vacante?"  class="inline-flex items-center px-4 py-2 bg-red-600
        dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase
        tracking-widest hover:bg-red-700 dark:hover:bg-white focus:bg-red-700 dark:focus:bg-white active:bg-red-900
        dark:active:bg-indigo-300 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2
        dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Eliminar</button>

            </li>
            @endforeach
            <!-- More people... -->
        </ul>

        @endif
      
          
         

    </div>

    <div class="mt-5 pt-7 mb-1 p-5">
        {{ $vacantes->links() }}
    </div>

</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
    Livewire.emit('mostrarAlerta'){
        Swal.fire({
  title: "Eliminar vacante?",
  text: "Una vacante eliminada no se puede recuperar!",
  icon: "warning",
  showCancelButton: true,
  confirmButtonColor: "#3085d6",
  cancelButtonColor: "#d33",
  confirmButtonText: "Si, borrar!"
}).then((result) => {
  if (result.isConfirmed) {
    Swal.fire({
      title: "Eliminado!",
      text: "Vacante eliminada.",
      icon: "success"
    });
  }
});
    }
</script>


@endpush