<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $post = new Post();
        $post->title = 'Post 11';
        $post->categoria = 'Categoria 11';
        $post->slug  =  'Categoria-11';
        $post->content = 'Contenido 11';
        $post->save();
        
        // Ejecutar un Factory
        Post::factory(100)->create();
        // ejecutamos el factory con php artisan db:seed 
    }
}
