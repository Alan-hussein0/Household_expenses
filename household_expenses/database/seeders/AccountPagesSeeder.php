<?php

namespace Database\Seeders;

use App\Models\AccountPages;
use Database\Factories\AccountPagesFactory;
use Illuminate\Database\Seeder;

class AccountPagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AccountPages::factory()
                    ->count(1)
                    ->create();
    }
}
