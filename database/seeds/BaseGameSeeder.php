<?php

use Illuminate\Database\Seeder;

class BaseGameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\User', 5)->create();

        DB::table('stages')->insert([
            'name' => '1',
            'active' => '1',
        ]);

        DB::table('stages')->insert([
            'name' => '2',
            'active' => '0',
        ]);

        DB::table('rounds')->insert([
            'count' => '1',
            'active' => '1',
        ]);

        DB::table('rounds')->insert([
            'count' => '2',
            'active' => '0',
        ]);

        DB::table('rounds')->insert([
            'count' => '3',
            'active' => '0',
        ]);

        DB::table('rounds')->insert([
            'count' => '4',
            'active' => '0',
        ]);

        DB::table('rounds')->insert([
            'count' => '5',
            'active' => '0',
        ]);

        DB::table('rounds')->insert([
            'count' => '6',
            'active' => '0',
        ]);

        DB::table('rounds')->insert([
            'count' => '7',
            'active' => '0',
        ]);

        DB::table('rounds')->insert([
            'count' => '8',
            'active' => '0',
        ]);

        DB::table('wagers')->insert([
            'stage_id' => '1',
            'value' => '1',
            'active' => '1',
        ]);

        DB::table('wagers')->insert([
            'stage_id' => '1',
            'value' => '3',
            'active' => '1',
        ]);

        DB::table('wagers')->insert([
            'stage_id' => '1',
            'value' => '5',
            'active' => '1',
        ]);

        DB::table('wagers')->insert([
            'stage_id' => '2',
            'value' => '3',
            'active' => '0',
        ]);

        DB::table('wagers')->insert([
            'stage_id' => '2',
            'value' => '5',
            'active' => '0',
        ]);

        DB::table('wagers')->insert([
            'stage_id' => '2',
            'value' => '7',
            'active' => '0',
        ]);

        DB::table('categories')->insert([
            'name' => 'Geography',
        ]);

        DB::table('categories')->insert([
            'name' => 'Science',
        ]);

        DB::table('categories')->insert([
            'name' => 'Technology',
        ]);

        DB::table('categories')->insert([
            'name' => 'Food & Drink',
        ]);

        DB::table('categories')->insert([
            'name' => 'History',
        ]);

        DB::table('categories')->insert([
            'name' => 'Sports',
        ]);

        DB::table('categories')->insert([
            'name' => 'Entertainment',
        ]);

        DB::table('categories')->insert([
            'name' => 'General',
        ]);

        DB::table('categories')->insert([
            'name' => 'Meta',
        ]);

        DB::table('categories')->insert([
            'name' => 'Food',
        ]);

        DB::table('categories')->insert([
            'name' => 'Art',
        ]);

        DB::table('categories')->insert([
            'name' => 'Cooking',
        ]);

        DB::table('categories')->insert([
            'name' => 'Books',
        ]);

        DB::table('categories')->insert([
            'name' => 'Advertising',
        ]);

        DB::table('categories')->insert([
            'name' => 'Biology',
        ]);

        DB::table('categories')->insert([
            'name' => 'Baseball',
        ]);

        DB::table('categories')->insert([
            'name' => 'Business',
        ]);

        DB::table('categories')->insert([
            'name' => 'Bacteria',
        ]);

        DB::table('categories')->insert([
            'name' => 'Music',
        ]);

        DB::table('categories')->insert([
            'name' => 'Astrology',
        ]);

        DB::table('categories')->insert([
            'name' => 'Television',
        ]);

        DB::table('categories')->insert([
            'name' => 'Movies',
        ]);

		DB::table('questions')->insert([
            'round_id' => '1',
            'category_id' => '1',
            'text' => 'What\'s the meaning of life?',
            'answer' => 'the condition that distinguishes animals and plants from inorganic matter, including the capacity for growth, reproduction, functional activity, and continual change preceding death or 42',
            'active' => '0',
            'type' => '1',
        ]);

        DB::table('questions')->insert([
            'round_id' => '1',
            'category_id' => '2',
            'text' => 'Name three different fruit trees.',
            'answer' => 'An orange, apple, banana tree',
            'active' => '0',
            'type' => '2',
        ]);

        DB::table('questions')->insert([
            'round_id' => '1',
            'category_id' => '3',
            'text' => 'How many grains of sand are there in a cup?',
            'answer' => '2 million grains',
            'active' => '0',
            'type' => '3',
            'src' => 'https://image.shutterstock.com/z/stock-photo-white-coffee-cup-on-white-sand-beach-selective-focus-427505410.jpg',
        ]);

        DB::table('questions')->insert([
            'round_id' => '2',
            'category_id' => '1',
            'text' => 'What\'s the meaning of life?',
            'answer' => 'the condition that distinguishes animals and plants from inorganic matter, including the capacity for growth, reproduction, functional activity, and continual change preceding death or 42',
            'active' => '0',
            'type' => '1',
        ]);

        DB::table('questions')->insert([
            'round_id' => '2',
            'category_id' => '2',
            'text' => 'Name three different fruit trees.',
            'answer' => 'An orange, apple, banana tree',
            'active' => '0',
            'type' => '1',
        ]);

        DB::table('questions')->insert([
            'round_id' => '2',
            'category_id' => '3',
            'text' => 'How many grains of sand are there in a cup?',
            'answer' => '2 million grains',
            'active' => '0',
            'type' => '1',
            'src' => 'https://image.shutterstock.com/z/stock-photo-white-coffee-cup-on-white-sand-beach-selective-focus-427505410.jpg',
        ]);

        DB::table('games')->insert([
            'name' => 'Game Night',
            'code' => 'gamenight123',
            'active' => '1',
        ]);
    }
}
