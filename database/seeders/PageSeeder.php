<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pages = [
            [
                'title' => 'About Us',
                'slug' => 'about-us',
                'content' => '<h2>About Isan Ekiti</h2>
                <p>Isan Ekiti is one of the prominent towns in Ekiti State, Nigeria. Our community is rich in culture, tradition, and history, with a heritage that spans centuries.</p>

                <h3>Our Vision</h3>
                <p>To become a model community that balances tradition with modernization, fostering development while preserving our unique cultural identity.</p>

                <h3>Our Mission</h3>
                <p>To unite the people of Isan Ekiti, both at home and in the diaspora, in promoting the welfare, development, and advancement of our community.</p>',
                'meta_description' => 'Learn about Isan Ekiti - our history, culture, vision, and mission for the community.',
                'is_published' => true,
                'display_order' => 1,
            ],
            [
                'title' => 'History of Isan Ekiti',
                'slug' => 'history',
                'content' => '<h2>The Rich History of Isan Ekiti</h2>
                <p>Isan Ekiti has a long and storied history that dates back several centuries. Our ancestors established this community as a center of learning, culture, and commerce.</p>

                <h3>Early Settlement</h3>
                <p>The founding of Isan Ekiti is attributed to our forefathers who migrated from Ile-Ife, the ancestral home of the Yoruba people.</p>

                <h3>Cultural Heritage</h3>
                <p>Over the years, Isan Ekiti has maintained its unique cultural practices, festivals, and traditions that distinguish us within the larger Ekiti cultural landscape.</p>',
                'meta_description' => 'Discover the rich history and heritage of Isan Ekiti from its founding to present day.',
                'is_published' => true,
                'display_order' => 2,
            ],
            [
                'title' => 'Isan Day',
                'slug' => 'isan-day',
                'content' => '<h2>Isan Day Celebration</h2>
                <p>Isan Day is our annual celebration that brings together sons and daughters of Isan Ekiti from across the world. It is a day of cultural display, reunion, and community development.</p>

                <h3>About the Celebration</h3>
                <p>This special day features traditional dances, cultural displays, honoring of distinguished indigenes, and discussions on community development.</p>

                <h3>Join Us</h3>
                <p>Whether you are at home or in the diaspora, Isan Day is an opportunity to reconnect with your roots and contribute to the development of our beloved community.</p>',
                'meta_description' => 'Learn about Isan Day - our annual celebration bringing together indigenes from around the world.',
                'is_published' => true,
                'display_order' => 3,
            ],
            [
                'title' => 'Attractions',
                'slug' => 'attractions',
                'content' => '<h2>Visit Isan Ekiti</h2>
                <p>Isan Ekiti is home to numerous attractions that showcase our rich cultural heritage and natural beauty.</p>

                <h3>Cultural Sites</h3>
                <p>Explore our historical sites, traditional shrines, and cultural centers that tell the story of our people.</p>

                <h3>Natural Beauty</h3>
                <p>Experience the scenic landscapes, hills, and natural formations that make Isan Ekiti a beautiful destination.</p>',
                'meta_description' => 'Discover the attractions and tourist sites in Isan Ekiti.',
                'is_published' => true,
                'display_order' => 4,
            ],
        ];

        foreach ($pages as $page) {
            Page::create($page);
        }
    }
}
