<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if the admin already exists
        $adminExists = DB::table('users')->where('email', 'abcd@gmail.com')->exists();

        if (!$adminExists) {
            DB::table('users')->insert([
                'name' => 'Admin',
                'email' => 'abcd@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
