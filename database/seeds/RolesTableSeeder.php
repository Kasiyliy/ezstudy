<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\System\Role::create([
            'name' => 'ADMIN'
        ]);

        \App\Models\System\Role::create([
            'name' => 'USER'
        ]);
    }
}
