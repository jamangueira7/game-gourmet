<?php

use Illuminate\Database\Seeder;
use App\Http\Models\Food;
use App\Http\Models\Feature;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Food::class, 1)->create([
            'value' => "lasanha",
        ]);

        factory(Food::class, 1)->create([
            'value' => "bolo de chocolate",
            'standard' => true,
        ]);

        factory(Feature::class, 1)->create([
            'value' => "massa",
            'food_id' => 1,
        ]);

    }
}
