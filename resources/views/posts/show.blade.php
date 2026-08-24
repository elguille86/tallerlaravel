<x-app-layout>
    <a href="{{ route('posts.index') }}" class="text-blue-600 hover:text-blue-800 underline font-medium transition duration-150"> Volver a Posts</a>
    <h2 class="text-3xl md:text-4xl font-bold text-center text-gray-800 my-6">Titulo del Post: <b>{{ $post->title }}</b></h2>
    @if (true)
        <p><b>Categoria : </b>{{ $post->categoria }}</p>
        <p>{{ $post->content }}</p>
        <a href="{{ route('posts.edit', $post->id ) }}" class="text-blue-600 hover:text-blue-800 underline font-medium transition duration-150">Editar Post</a>
        
        <form action="{{ route('posts.destroy', $post->id ) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="inline-flex items-center justify-center bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium py-2 px-4 rounded-md transition duration-150 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"> Eliminar Post</button>
        </form>
    @endif
</body>
</html>
</x-app-layout>