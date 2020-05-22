<?php

use Illuminate\Database\Seeder;

class InitialGameSeeder extends Seeder
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

        DB::table('rounds')->insert([
            'count' => '1',
            'active' => '1',
        ]);

        DB::table('wagers')->insert([
            'stage_id' => '1',
            'value' => '200',
            'active' => '1',
        ]);

        DB::table('wagers')->insert([
            'stage_id' => '1',
            'value' => '400',
            'active' => '1',
        ]);

        DB::table('wagers')->insert([
            'stage_id' => '1',
            'value' => '600',
            'active' => '1',
        ]);

        DB::table('categories')->insert([
            'name' => 'Technology',
        ]);

        DB::table('questions')->insert([
            'category_id' => '1',
            'text' => 'What\'s the meaning of life?',
            'answer' => 'the condition that distinguishes animals and plants from inorganic matter, including the capacity for growth, reproduction, functional activity, and continual change preceding death or 42',
            'active' => '0',
            'type' => '1',
        ]);

        DB::table('questions')->insert([
            'category_id' => '1',
            'text' => 'Name three different fruit trees.',
            'answer' => 'An orange, apple, banana tree',
            'active' => '0',
            'type' => '2',
        ]);

        DB::table('questions')->insert([
            'category_id' => '1',
            'text' => 'How many grains of sand are there in a cup?',
            'answer' => '2 million grains',
            'active' => '0',
            'type' => '3',
            'src' => 'https://image.shutterstock.com/z/stock-photo-white-coffee-cup-on-white-sand-beach-selective-focus-427505410.jpg',
        ]);

        DB::table('games')->insert([
            'name' => 'Game Night',
            'code' => 'gamenight123',
            'active' => '1',
        ]);
    }
}
