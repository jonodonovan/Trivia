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

        DB::table('questions')->insert([
            'round_id' => '1',
            'category_id' => '1',
            'text' => 'What\'s the meaning of life?',
            'answer' => 'the condition that distinguishes animals and plants from inorganic matter, including the capacity for growth, reproduction, functional activity, and continual change preceding death or 42',
            'active' => '0',
            'type' => '1',
        ]);

        DB::table('games')->insert([
            'name' => 'Game Night',
            'code' => 'gamenight123',
            'active' => '1',
        ]);
    }
}
