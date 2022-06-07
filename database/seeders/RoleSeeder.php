<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Sequence;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::factory(3)->state(new Sequence(
            ['id' => 1, 'Role' => 'Admin'],
            ['id' => 2, 'Role' => 'Student'],
            ['id' => 3, 'Role' => 'Supervisor'],
        ))->create();
    }
}
