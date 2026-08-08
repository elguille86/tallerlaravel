 
{{--  <x-app-layout>: se llama al componente app-layout.blade.php y se le pasa el contenido que esta dentro de el como un slot,     es decir, el contenido que esta dentro de <x-app-layout> y </x-app-layout> se pasa al componente app-layout.blade.php como una variable $slot. --}}
<x-app-layout>
    <div class="max-w-4xl mx-auto px-4">
         <x-alert type="danger"    class="mb-4">  
            <x-slot name="title">Titulo de la Alerta</x-slot>
            Contenido de la Alerta
        </x-alert>
        <p>Hola Mundo</p>
         <x-alert2 type="info"    class="mb-4">  
            <x-slot name="title">Titulo de la Alerta</x-slot>
            Contenido de la Alerta con Plantilla de Componente
        </x-alert2>        
    </div>
 </x-app-layout>