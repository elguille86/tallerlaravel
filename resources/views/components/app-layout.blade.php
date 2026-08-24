<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel 12</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <header>
        <nav class="bg-gray-800 text-white p-4">
            <div class="max-w-4xl mx-auto px-4">
                <h1 class="text-xl font-bold">Mi Aplicación</h1>
            </div>
        </nav>
    </header>
    <div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-md mt-6">
    <!-- el slot es una variable que contiene el contenido que se pasa al componente desde la vista principal, -->
    {{$slot}}
    </div>
    <footer class="bg-gray-800 text-white p-4 mt-4">
        <div class="max-w-4xl mx-auto px-4">
            <p>&copy; 2024 Mi Aplicación. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>
</html>