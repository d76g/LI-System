<?php

namespace Database\Seeders;

use App\Models\Rating;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rating::factory(70)
            ->hasCompany(1)
            ->create();
    }
}
