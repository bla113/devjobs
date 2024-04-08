<x-app-layout>
    <div class="isolate bg-white px-3 py-5 sm:py-5 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Editar Vacante</h2>
            <p class="mt-2 text-lg leading-8 text-gray-600">{{ $vacante->titulo }}</p>
            
        </div>
        <livewire:editar-vacante :vacante="$vacante">
    </div>
   
    
          
  
      
   
   
   </x-app-layout>