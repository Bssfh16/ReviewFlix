<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Admin user',
            'username' => 'admin',
            'email' => 'admin@ehb.be',
            'password' => 'Password!321',
            'is_admin' => true,
        ]);

        User::factory(5)->create();

        NewsItem::factory(5)->create();

        MediaItem::factory(5)->create();

        FaqCategory::factory(6)->create();

        FaqItem::factory(5)->create();

        Review::factory(5)->create();
    }
}
