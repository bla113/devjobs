<form action="#" method="POST" class="mx-auto mt-16 max-w-xl sm:mt-20" wire:submit.prevent='editarVacante'>
    <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
        <div>
            <label for="first-name" class="block text-sm font-semibold leading-6 text-gray-900">Titulo de la
                vacante</label>
            <div class="mt-2.5">
                <input type="text" wire:model="titulo" placeholder="Ingrese el titulo de la vacante" id="first-name"
                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>

            @error('titulo')
            {{ $message }}
            @enderror
        </div>
        <div>
            <div class="sm:col-span-2">
                <label for="phone-number" class="uppercase block text-sm font-semibold leading-6 text-gray-900">Seleccione el
                    salario de la oferta</label>
                <div class="relative mt-2.5">
                    <select id="salario" wire:model="salario" wire:model="salario"
                        class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm shadow-blue-500 ring-1 ring-inset ring-blue-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-400 sm:text-sm sm:leading-6">

                        <option>--Seleccione una opción</option>

                        @foreach ($salarios as $salario )
                        <option value="{{ $salario->id }}">{{ $salario->salario }}</option>
                        @endforeach


                    </select>

                    @error('salario')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="sm:col-span-2">
            <label for="categoria" class="uppercase block text-sm font-semibold leading-6 text-gray-900">Seleccione la
                categoria de la oferta</label>
            <div class="mt-2.5">

                <select id="categoria" wire:model="categoria"
                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm shadow-blue-500 ring-1 ring-inset ring-blue-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-400 sm:text-sm sm:leading-6">

                    <option>--Seleccione una opción</option>

                    @foreach ($categorias as $categoria )
                    <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                    @endforeach

                </select>


                @error('categoria')
                {{ $message }}
                @enderror

            </div>
        </div>
        <div class="sm:col-span-2">
            <label for="empresa" class="uppercase block text-sm font-semibold leading-6 text-gray-900">Nombre de la empresa</label>
            <div class="mt-2.5">
                <input type="text"  id="empresa"  placeholder="Ejemplo: Uber, Netflix, Amazon"   wire:model="empresa" 
                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>

            @error('empresa')
            {{ $message }}
            @enderror
        </div>
     
        <div class="sm:col-span-2">
            <label for="ultimo_dia" class="uppercase block text-sm font-semibold leading-6 text-gray-900">Último día para postularse</label>
            <div class="mt-2.5">
                <input type="date"  id="ultimo_dia"   wire:model="ultimo_dia" 
                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>

            @error('ultimo_dia')
            {{ $message }}
            @enderror
        </div>
        <div class="sm:col-span-2">
            <label for="descripcion" class="uppercase  text-sm font-semibold leading-6 text-gray-900">Descripción de la vacante</label>
            <div class="mt-2.5">
                <textarea  id="descripcion" rows="4" wire:model="descripcion" 
                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
            </div>
            @error('descripcion')
            {{ $message }}
            @enderror
        </div>
       
        <div class="flex gap-x-4 sm:col-span-2">
            <div class="flex h-6 items-center">
                <!-- Enabled: "bg-indigo-600", Not Enabled: "bg-gray-200" -->
                <x-text-input id="imagen_nueva" wire:model="imagen_nueva" class="block mt-1" type="file" name="imagen_nueva" />


              
            </div>
            @error('imagen_nueva')
            {{ $message }}
            @enderror
            <div class="my-5 w-80">
                <label for="" class=" uppercase text-base font-semibold leading-7 tracking-tight text-gray-900">Actual</label>
                <img src="{{ asset('storage/vacantes/'.$imagen)}}" alt="{{ 'Imagen Vacante'.$titulo }}">
            </div>
              @if ($imagen_nueva)
            <div class="my-5 w-80">
                <label for="" class=" uppercase text-base font-semibold leading-7 tracking-tight text-gray-900">Nueva</label>

          
                <img src="{{ $imagen_nueva->temporaryUrl()}}" alt="">
            </label>
            </div>
                
            @endif 
           
        </div>
    </div>
    <div class="mt-10">
        <button type="submit"
            class="block w-full rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Guardar Cambios</button>
    </div>
</form>