<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use Faker\Generator as Faker;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $factory->define(Category::class, function (Faker $faker) {
            return [
                'name'          =>  $faker->name,
                'description'   =>  $faker->realText(100),
                'parent_id'     =>  1,
                'menu'          =>  1,
            ];
        });
    }
}
