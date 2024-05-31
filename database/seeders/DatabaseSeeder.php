<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Task;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // $this->call([ //para chamar as seeders
        //     UserSeeder::class,
        //     //TaskSeeder::class,
        // ]);

        //para chamar a factory: 
        // factory(xx) é o numero de vezes que irá criar. Não tem confirmação no terminal. CUIDADO NA ORDEM
        User::factory(10)->create();
        Category::factory(100)->create();
        Task::factory(30)->create();


        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
