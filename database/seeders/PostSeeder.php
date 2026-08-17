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
        $post->content = 'Contenido 11';
        $post->save();

        $post = new Post();
        $post->title = 'Post 12';
        $post->categoria = 'Categoria 12';
        $post->content = 'Contenido 12';
        $post->save();


        $post = new Post();
        $post->title = 'Post 13';
        $post->categoria = 'Categoria 13';
        $post->content = 'Contenido 13';
        $post->save();

    }
}
