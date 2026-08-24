<x-app-layout>
    <a href="{{ route('posts.index') }}" class="text-blue-600 hover:text-blue-800 underline font-medium transition duration-150"> Volver a Posts</a>
    <h2 class="text-3xl md:text-4xl font-bold text-center text-gray-800 my-6">Formulario para crear un nuevo Post</h2>
    <form action="{{  route('posts.store') }}" method="post">
        @csrf
        <label for="">
            Titulo : <input type="text"  name="title" 
            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-150" required>
        </label>
        <br/><br/>

        <label for="">
            Categoria : <input type="text"   name="categoria" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-150" required>
        </label>
        <br/><br/>

        <label for=""> Contenido : 
        <textarea name="content" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-150 resize-y" ></textarea>
        </label>
        <br/><br/>

        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md transition duration-150 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Crear Post</button>
    </form>
</x-app-layout>