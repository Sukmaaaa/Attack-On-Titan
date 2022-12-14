<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Naufal',
            'email' => 'superadmin@kyojin.com',
            'password' => Hash::make('kerupukular')
        ])->assignRole('super admin');

        User::create([
            'name' => 'Sukma',
            'email' => 'admin@kyojin.com',
            'password' => Hash::make('sukmasesat')
        ])->assignRole('admin');

        User::create([
            'name' => 'Alif',
            'email' => 'user@kyojin.com',
            'password' => Hash::make('alifpedo')
        ])->assignRole('user');

        User::create([
            'image' => 'https://www.dailysia.com/wp-content/uploads/2022/03/Sarada-Uchiha_1-660x400.jpg',
            'name' => 'afii',
            'email' => 'afii@kyojin.com',
            'password' => Hash::make('afiikyojin')
        ])->assignRole('admin');
    }
}
