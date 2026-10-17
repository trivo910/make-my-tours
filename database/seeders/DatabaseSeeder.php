<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $email = env('ADMIN_EMAIL');
        $password = env('ADMIN_PASSWORD');

        if (! $email || ! $password) {
            $this->command?->warn('Admin account skipped. Set ADMIN_EMAIL and ADMIN_PASSWORD in .env, then run db:seed.');
            return;
        }

        User::updateOrCreate(['email' => $email], [
            'name' => env('ADMIN_NAME', 'Administrator'),
            'password' => $password,
            'role' => 'admin',
        ]);
    }
}
