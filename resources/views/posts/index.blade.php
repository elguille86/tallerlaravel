
<x-app-layout>
    <h2 class="text-4xl font-bold mb-4" >Aqui se mostrar todos los posts</h2>
    <a href="{{ route('posts.create') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow" >Nuevo Post</a>
    <ul>
    @foreach ($posts as  $post)
    <li> 
        <a href="{{ route('posts.show',$post->id) }}" class="text-blue-600 hover:text-blue-800 underline font-medium transition duration-150"  > {{ $post->title }} </a>
    </li>        
    @endforeach
    </ul>
    {{ $posts->links() }}
</x-app-layout>
