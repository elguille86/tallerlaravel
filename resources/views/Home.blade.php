<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel 12</title>
    <script src="https://cdn.tailwindcss.com"></script>
     
</head>
<body>
    <div class="max-w-4xl mx-auto px-4">
         <x-alert type="danger"    class="mb-4">  
            <x-slot name="title">Titulo de la Alerta</x-slot>
            Contenido de la Alerta
        </x-alert>
        <p>Hola Mundo</p>
         <x-alert2 type="info"    class="mb-4">  
            <x-slot name="title">Titulo de la Alerta</x-slot>
            Contenido de la Alerta
        </x-alert2>        
    </div>
</body>
</html>