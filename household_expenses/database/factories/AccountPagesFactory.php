<?php

namespace Database\Factories;

use App\Models\AccountPages;
use Illuminate\Database\Eloquent\Factories\Factory;

class AccountPagesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AccountPages::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'page' => $this->faker->text(),
            'reckoning' => $this->faker->numerify('###'),
        ];
    }
}
