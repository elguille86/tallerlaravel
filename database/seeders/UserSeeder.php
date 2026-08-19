<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seeder para crear usuario de prueba
        $user = new User();
        $user->name = 'Luis Perez';
        $user->email = 'luisperes@gmail.com';
        $user->password = bcrypt( '12345678');
        $user->save();

        $user = new User();
        $user->name = 'Luz Vera';
        $user->email = 'lvera@gmail.com';
        $user->password = bcrypt( '12345678');
        $user->save();
    }
}
