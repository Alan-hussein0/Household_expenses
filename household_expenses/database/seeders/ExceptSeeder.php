<?php

namespace Database\Seeders;

use App\Models\Except;
use Illuminate\Database\Seeder;

class ExceptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Except::factory()
        ->count(20)
        ->create();
    }
}
