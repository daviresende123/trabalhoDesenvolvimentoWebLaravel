<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Movie; 
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // Admin
        User::create([
            'name' => 'Admin',
            'email' => 'adm@adm.com',
            'password' => bcrypt('adm'),
            'is_admin' => true
        ]);

        // Usuários de teste
        User::factory(5)->create();

        // Filmes
        Movie::factory(10)->create();
    }
}
