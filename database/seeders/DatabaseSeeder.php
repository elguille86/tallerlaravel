<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Usando Factory crearemos 10 usuarios usando UsserFactory.php
        User::factory(10)->create();
        // EJECUTAMOS NUEVAMENTE EL sEEDERS Y EL FACTORY
        // php artisan db:seed

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // ejecutamos los Seeder que se requiera
        $this->call([
            PostSeeder::class,
            UserSeeder::class,
        ]);
        //  Ejecutando con el php artisan db:seed

        // Seeder para crear usuario de prueba
        // $user = new User();
        // $user->name = 'Luis Perez';
        // $user->email = 'luisperes@gmail.com';
        // $user->password = bcrypt( '12345678');
        // $user->save();
        
    }
}
