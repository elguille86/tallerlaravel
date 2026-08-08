<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','El titulo por defecto')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- que es stack?  @ stack ('css') es una directiva de Blade que se utiliza para definir un stack de contenido que 
    puede ser llenado por las vistas que extienden esta plantilla. -->
    @stack('css')
</head>
<body>
    <header>
        <nav class="bg-gray-800 text-white p-4">
            <div class="max-w-4xl mx-auto px-4">
                <h1 class="text-xl font-bold">Mi Aplicación</h1>
            </div>
        </nav>|
    </header>
    <!-- @ yield ('content').. es una directiva de Blade que se utiliza para definir una sección de contenido que puede ser sobrescrita por las vistas que extienden esta plantilla. 
    En este caso, se espera que las vistas que extienden esta plantilla proporcionen contenido para la sección 'content'.    -->
    @yield('content')
    <footer class="bg-gray-800 text-white p-4 mt-4">
        <div class="max-w-4xl mx-auto px-4">
            <p>&copy; 2024 Mi Aplicación. Todos los derechos reservados.</p>
        </div>
    </footer>
    <!-- que es stack?  @ stack ('js')  se utiliza para definir un stack de contenido JS -->
       @stack('js')
</body>
</html>