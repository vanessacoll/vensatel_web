<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([

            'name'  => 'Ruben Mendoza',
            'email' => 'ruben.mendoza@vensatel.com',
            'password' => bcrypt('rj30032004'),
            'suscriptor' => 'N',
            'isAdmin' => 1,
            'cedula' => '12312345',

        ]);
    }
}
