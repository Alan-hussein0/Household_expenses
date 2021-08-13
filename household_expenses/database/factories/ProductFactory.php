<?php

namespace Database\Factories;

use App\Models\AccountPages;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::pluck('id')->toArray();
        $page = AccountPages::pluck('id')->toArray();
        return [
            'name' => $this->faker->name(),
            'price' => $this->faker->numerify('##.##'),
            'amount' => $this->faker->numerify('##'),
            'description' => $this->faker->paragraph(),
            'calculated' => $this->faker->boolean(),
            'user_id' => $this->faker->randomElement($user),
            'account_pages_id' => $this->faker->randomElement($page),
        ];
    }
}
