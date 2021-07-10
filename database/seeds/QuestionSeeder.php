<?php

use Illuminate\Database\Seeder;
use App\Http\Models\Question;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Question::class, 1)->create([
            'food' => "lasanha",
            'type' => "massa",
            'detail' => "",
        ]);
        factory(Question::class, 1)->create([
            'food' => "bolo de chocolate",
            'type' => "bolo",
            'detail' => "",
            'standard' => true,
        ]);
    }
}
