<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        user::factory()
            ->count(100)
            ->create();

        User::factory()->create([
            'name' => 'maxouloulou',
            'email' => 'maxence.joly@hotmail.com',
            'password' => Hash::make("123456789"),
            ])->save();
        }
}
