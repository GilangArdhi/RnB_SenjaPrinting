<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Customer Service',
                'password' => bcrypt('AgilPamungkas'),
                'email' => 'cs.senjaprinting@gmail.com',
                'role' => 'customer service'
            ],
            [
                'name' => 'Produksi',
                'password' => bcrypt('AgilPamungkas'),
                'email' => 'produksi.senjaprinting@gmail.com',
                'role' => 'produksi'
            ],
            [
                'name' => 'Quality Control',
                'password' => bcrypt('AgilPamungkas'),
                'email' => 'qc.senjaprinting@gmail.com',
                'role' => 'quality control'
            ],
            [
                'name' => 'Package',
                'password' => bcrypt('AgilPamungkas'),
                'email' => 'package.senjaprinting@gmail.com',
                'role' => 'package'
            ],
            [
                'name' => 'Pengiriman',
                'password' => bcrypt('AgilPamungkas'),
                'email' => 'pengiriman.senjaprinting@gmail.com',
                'role' => 'pengiriman'
            ],
        ];

        foreach ($users as $user) {
            user::create($user);
        }
    }
}
