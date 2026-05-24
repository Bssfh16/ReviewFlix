<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\NewsItem;
use App\Models\MediaItem;
use App\Models\FaqCategory;
use App\Models\FaqItem;
use App\Models\Review;
use App\Models\Contact;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@ehb.be',
            'password' => Hash::make('Password!321'),
            'is_admin' => true,
        ]);

        User::factory(5)->create();

        NewsItem::factory(5)->create();

        MediaItem::factory(5)->create();

        FaqCategory::create(['subject' => 'Account']);
        FaqCategory::create(['subject' => 'Reviews']);
        FaqCategory::create(['subject' => 'General']);
        FaqCategory::create(['subject' => 'Films']);
        FaqCategory::create(['subject' => 'Features']);
        FaqCategory::create(['subject' => 'Technical']);

        FaqItem::factory(5)->create();

        Review::factory(5)->create();

        Contact::factory(5)->create();
    }
}
