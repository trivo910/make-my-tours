<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\BlogCategory;
use App\Models\Setting;
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
        foreach ([
            ['name' => 'Travel Guides', 'slug' => 'travel-guides'],
            ['name' => 'Mumbai', 'slug' => 'mumbai'],
            ['name' => 'Travel Tips', 'slug' => 'travel-tips'],
        ] as $category) {
            BlogCategory::firstOrCreate(['slug' => $category['slug']], ['name' => $category['name']]);
        }

        Setting::firstOrCreate(['key' => 'contact_auto_reply_enabled'], ['value' => '0']);

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
