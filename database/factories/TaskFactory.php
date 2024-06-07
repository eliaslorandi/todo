<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::all()->random();

        while(count($user->categories) == 0){ //evita erro de usuario sem categoria
            $user = User::all()->random();
        }
        //boa pratica seria pegar usuario que tenha categoria diretamente


        //se o novo usuario nao tiver categoria? usa while
        // if(count($user->categories) == 0){
        //     $user = User::all()->random();
        // }

        return [
            'is_done' => fake()->boolean(),
            'title' => fake()->text(30),
            'description' => fake()->text(60),
            'due_date' => fake()->dateTime(),
            'user_id' => User::all()->random(),
            'category_id' => Category::all()->random(),
        ];
    }
}
