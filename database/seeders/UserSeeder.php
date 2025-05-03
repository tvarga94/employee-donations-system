<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->delete();

        User::create([
            'name' => 'Test Employee',
            'email' => 'employee@example.com',
            'password' => Hash::make('password'),
        ]);

        User::factory()->count(5)->create();
    }
}
