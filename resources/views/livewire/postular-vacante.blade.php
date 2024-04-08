<div>
    <form action="#" method="POST" class="mx-auto mt-16 max-w-xl sm:mt-20" wire:submit.prevent='postularme'>

        @if (session()->has('mensaje'))


        <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
            role="alert">
           {{ session('mensaje') }} <span class="font-medium"> Mucha Suerte! </span>.
        </div>
        @else

        <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">


            <div class="sm:col-span-2">
                <label for="first-name" class="uppercase block  font-semibold leading-6 text-gray-900">Curriculum o Hoja
                    de Vida en PDF</label>

                <div class="mt-2.5">
                    <input type="file" wire:model="cv" accept=".pdf"
                        class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        name="" id="">

                </div>
            </div>
            @error('cv')
            <h5 class="block font-sans text-xl font-semibold leading-snug tracking-normal text-red antialiased">
                {{ $message }}
            </h5>

            @enderror

        </div>
        <div class="mt-10">
            <button type="submit"
                class="block w-full rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Postularme</button>
        </div>
        @endif
        

      
    </form>


</div>