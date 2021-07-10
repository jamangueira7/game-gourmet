<?php

use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Question::class, 1)->create([
            'food' => "lasanha",
            'type' => "massa",
            'detail' => "",
        ]);
        factory(\App\Question::class, 1)->create([
            'food' => "bolo de chocolate",
            'type' => "bolo",
            'detail' => "",
            'standard' => true,
        ]);
    }
}
