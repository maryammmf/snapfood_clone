<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User\User;
use App\Models\User\UserAddress;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

         \App\Models\Admin\Admin::factory()->create([
             'name' => 'admin',
             'email' => 'admin@gmail.com',
             'password'=>Hash::make('123'),
         ]);

         User::factory(10)->create();
         UserAddress::factory(10)->create();
    }
}
