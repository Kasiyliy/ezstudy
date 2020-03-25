<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\System\User::create([
            'first_name' => 'ADMIN',
            'last_name' => 'ADMIN',
            'password' => bcrypt('password'),
            'role_id' => \App\Models\System\Role::ROLE_ADMIN,
            'email' => 'admin@mail.ru'
        ]);
    }
}
