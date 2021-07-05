<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Luis',
            'email' => 'ingelegui@gmail.com',
            'password' => '$2y$10$.jDlyzBcuMtHl9dkyfHVv.v4zEP0ANttAanlOpJybHDvukKSrIYz6' //arz48tuc
        ])->assignRole('admin');
        $user = User::create([
            'name' => 'Pedro',
            'email' => 'pedro@gmail.com',
            'password' => '$2y$10$.jDlyzBcuMtHl9dkyfHVv.v4zEP0ANttAanlOpJybHDvukKSrIYz6'
        ])->assignRole('user');
    }
}
