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

        DB::table('questions')->insert([
            'text' => 'what\'s the meaning of life',
            'answer' => 'the condition that distinguishes animals and plants from inorganic matter, including the capacity for growth, reproduction, functional activity, and continual change preceding death or 42',
            'active' => '0',
        ]);
    }
}
