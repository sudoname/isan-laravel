<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if admin user already exists
        $adminEmail = 'admin@isanekiti.com';

        $admin = User::where('email', $adminEmail)->first();

        if (!$admin) {
            // Create admin user
            User::create([
                'name' => 'Admin User',
                'email' => $adminEmail,
                'password' => Hash::make('password'), // Change this in production!
                'is_admin' => true,
                'email_verified_at' => now(),
            ]);

            $this->command->info('Admin user created successfully!');
            $this->command->info('Email: ' . $adminEmail);
            $this->command->info('Password: password (Please change this!)');
        } else {
            // Update existing user to admin
            $admin->update(['is_admin' => true]);
            $this->command->info('Existing user updated to admin successfully!');
            $this->command->info('Email: ' . $adminEmail);
        }
    }
}
