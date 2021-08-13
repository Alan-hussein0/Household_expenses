<?php

namespace Database\Factories;

use App\Models\AccountPages;
use App\Models\Invoice;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Invoice::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'invoice' => $this->faker->numerify('###'),
            'user_id' => User::factory(),
            'account_pages_id' => AccountPages::factory(),
        ];
    }
}
