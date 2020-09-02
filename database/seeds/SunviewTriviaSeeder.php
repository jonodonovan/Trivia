<?php

use Illuminate\Database\Seeder;

class SunviewTriviaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('wagers')->insert([
            'group' => '1',
            'value' => '1',
        ]);

        DB::table('wagers')->insert([
            'group' => '1',
            'value' => '3',
        ]);

        DB::table('wagers')->insert([
            'group' => '1',
            'value' => '5',
        ]);

        DB::table('wagers')->insert([
            'group' => '2',
            'value' => '3',
        ]);

        DB::table('wagers')->insert([
            'group' => '2',
            'value' => '5',
        ]);

        DB::table('wagers')->insert([
            'group' => '2',
            'value' => '7',
        ]);

        DB::table('categories')->insert([
            'name' => 'SunView',
        ]);

		// Round 1
		DB::table('questions')->insert([
            'round' => '1',
			'category_id' => '1',
			'wager_group' => '1',
            'text' => 'How many new features are introduced in ChangeGear 8?',
            'answer' => '7',
            'active' => '0',
            'type' => '1',
		]);
		DB::table('questions')->insert([
            'round' => '1',
			'category_id' => '1',
			'wager_group' => '1',
            'text' => 'Which new feature in ChangeGear 8 does no other ITSM vendor have?',
            'answer' => 'Multiple self-service portals',
            'active' => '0',
            'type' => '1',
		]);
		DB::table('questions')->insert([
            'round' => '1',
			'category_id' => '1',
			'wager_group' => '1',
            'text' => 'What year was ChangeGear first released?',
            'answer' => '2005',
            'active' => '0',
            'type' => '1',
		]);

		// Round 2
		DB::table('questions')->insert([
            'round' => '2',
			'category_id' => '1',
			'wager_group' => '1',
            'text' => 'What is the name of ChangeGear’s AI?',
            'answer' => 'Willow',
            'active' => '0',
            'type' => '1',
		]);
		DB::table('questions')->insert([
            'round' => '2',
			'category_id' => '1',
			'wager_group' => '1',
            'text' => 'Is ChangeGear 8 an ITIL or ITSM solution?',
            'answer' => 'ITSM',
            'active' => '0',
            'type' => '1',
		]);
		DB::table('questions')->insert([
            'round' => '2',
			'category_id' => '1',
			'wager_group' => '1',
            'text' => 'What kind of architecture is ChangeGear 8 built on?',
            'answer' => '64-bit',
            'active' => '0',
            'type' => '1',
		]);

		// Round 3
		DB::table('questions')->insert([
            'round' => '3',
			'category_id' => '1',
			'wager_group' => '1',
            'text' => 'When was Sunview Software Created?',
            'answer' => '2003 or 2004',
            'active' => '0',
            'type' => '1',
		]);
		DB::table('questions')->insert([
            'round' => '3',
			'category_id' => '1',
			'wager_group' => '1',
            'text' => 'What award did Sunview Software win at the Pink Elephant?',
            'answer' => 'Innovation of the Year Award',
            'active' => '0',
            'type' => '1',
		]);
		DB::table('questions')->insert([
            'round' => '3',
			'category_id' => '1',
			'wager_group' => '1',
            'text' => 'Who founded Sunview Software?',
            'answer' => 'Seng Sun',
            'active' => '0',
            'type' => '1',
		]);

		// Round 4
		DB::table('questions')->insert([
            'round' => '4',
			'category_id' => '1',
			'wager_group' => '1',
            'text' => 'How many countries could you find Sunview Software in?',
            'answer' => '16',
            'active' => '0',
            'type' => '1',
		]);
		DB::table('questions')->insert([
            'round' => '4',
			'category_id' => '1',
			'wager_group' => '1',
            'text' => 'What 2 languages does our website support?',
            'answer' => 'English and German',
            'active' => '0',
            'type' => '1',
		]);
		DB::table('questions')->insert([
            'round' => '4',
			'category_id' => '1',
			'wager_group' => '1',
            'text' => 'How many engineers worked to design ChangeGear 8?',
            'answer' => '19',
            'active' => '0',
            'type' => '1',
		]);

		// Round 5
		DB::table('questions')->insert([
            'round' => '5',
			'category_id' => '1',
			'wager_group' => '2',
            'text' => 'What is the biggest department in Sunview Software?',
            'answer' => 'Sales',
            'active' => '0',
            'type' => '1',
		]);
		DB::table('questions')->insert([
            'round' => '5',
			'category_id' => '1',
			'wager_group' => '2',
            'text' => '(in feet) What is the distance from Seng\'s office to the conference room?',
            'answer' => '103 ft',
            'active' => '0',
            'type' => '1',
		]);
		DB::table('questions')->insert([
            'round' => '5',
			'category_id' => '1',
			'wager_group' => '2',
            'text' => 'How many cubicles are in the office?',
            'answer' => '85',
            'active' => '0',
            'type' => '1',
		]);

		// Round 6
		DB::table('questions')->insert([
            'round' => '6',
			'category_id' => '1',
			'wager_group' => '2',
            'text' => 'What floor is Sunview Software on?',
            'answer' => '2nd',
            'active' => '0',
            'type' => '1',
		]);
		DB::table('questions')->insert([
            'round' => '6',
			'category_id' => '1',
			'wager_group' => '2',
            'text' => 'Why is our AI named Willow?',
            'answer' => 'After the tree',
            'active' => '0',
            'type' => '1',
		]);
		DB::table('questions')->insert([
            'round' => '6',
			'category_id' => '1',
			'wager_group' => '2',
            'text' => 'Who is our SVP?',
            'answer' => 'Michael (Mike) Hechler',
            'active' => '0',
            'type' => '1',
		]);

		// Round 7
		DB::table('questions')->insert([
            'round' => '7',
			'category_id' => '1',
			'wager_group' => '2',
            'text' => 'How many active customers does Sunview Software have?',
            'answer' => '(as of 8.24) 276',
            'active' => '0',
            'type' => '1',
		]);
		DB::table('questions')->insert([
            'round' => '7',
			'category_id' => '1',
			'wager_group' => '2',
            'text' => 'What is a KB article?',
            'answer' => 'Our Knowledge Based articles that allow our users to use our tools to solve their software issues!',
            'active' => '0',
            'type' => '1',
		]);
		DB::table('questions')->insert([
            'round' => '7',
			'category_id' => '1',
			'wager_group' => '2',
            'text' => 'SunView Software is recognized by Gartner as what?',
            'answer' => 'a Notable ITSM Vendor in the 2020 Midmarket Context: Magic Quadrant for IT Service Management Tools',
            'active' => '0',
            'type' => '1',
		]);

		// Round 8
		DB::table('questions')->insert([
			'round' => '8',
			'category_id' => '1',
			'wager_group' => '2',
			'text' => 'What was the original location of Sunview Software?',
			'answer' => 'Tampa, FL',
			'active' => '0',
			'type' => '1',
		]);
		DB::table('questions')->insert([
			'round' => '8',
			'category_id' => '1',
			'wager_group' => '2',
			'text' => 'How many platform types does ChangeGear 8 have?',
			'answer' => '2: Cloud and subscription',
			'active' => '0',
			'type' => '1',
		]);
		DB::table('questions')->insert([
			'round' => '8',
			'category_id' => '1',
			'wager_group' => '2',
			'text' => 'What year was ChangeGear 7 released?',
			'answer' => '2016',
			'active' => '0',
			'type' => '1',
		]);

		// Round 9
		DB::table('questions')->insert([
            'round' => '9',
			'category_id' => '1',
			'wager_group' => '1',
            'text' => 'Who is our newest employee?',
            'answer' => 'Laura as of 8.12',
            'active' => '0',
            'type' => '3',
		]);

		// Empty
		// DB::table('questions')->insert([
        //     'round' => '1',
		// 	'category_id' => '1',
		// 	'wager_group' => '1',
        //     'text' => '',
        //     'answer' => '',
        //     'active' => '0',
        //     'type' => '1',
        // ]);

        DB::table('games')->insert([
            'name' => 'SunView Trivia',
            'code' => 'changegear8',
            'active' => '1',
        ]);
    }
}
