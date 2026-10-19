<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Harbourview Admin',
            'email' => 'admin@example.com',
            'role' => UserRole::Admin,
            'password' => Hash::make(config('app.demo_admin_password') ?: 'password'),
        ]);

        $this->call([
            PageSeeder::class,
            ServiceSeeder::class,
            ExtraServicesSeeder::class,
            SdaListingSeeder::class,
            TestimonialSeeder::class,
        ]);
    }
}
