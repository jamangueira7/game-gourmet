<?php

namespace App\Http\Repositories;

use App\Http\Models\Feature;
use App\Http\Models\Food;
use Illuminate\Support\Facades\Log;

class FoodRepository
{
    public function searchFood($data)
    {
        $resp = '';
        $final = false;

        if(empty($data['yes'])) {
            $all = Feature::all();

            foreach ($all as $key=>$item) {
                $check = $this->removeKeywords($item, $data['not']);
                if($check) {
                    unset($all[$key]);
                }
            }


            if(sizeof($all) == 0) {

                $resp = Food::whereDoesntHave('features')->first();

                if(in_array($resp['value'], $data['not'])) {
                    return "-1";
                }

                return [ "resp" => $resp['value'], 'final' => true];

            }

            foreach ($all as $key=>$item) {
                if(!empty($item['value'])) {
                    $resp = $item["value"];
                    continue;
                }
            }

            if(empty($resp)) {

                $resp = $all[1]['food'];
                $final = true;
            }

            return [ "resp" => $resp, 'final' => $final];
        } else {

            $all = Feature::whereIn("value", $data['yes'])
                ->get();



            if(count($all) === 1) {

                $resp = Food::where('id', $all[0]['food_id'])
                    ->first();

                if(isset($data['not']) && in_array($resp['value'], $data['not'])) {
                    return "-1";
                }

                return [ "resp" => $resp['value'], 'final' => true];
            }

            $foods = [];

            foreach ($all as $key=>$feature) {
                array_push($foods, $feature->food['id']);
            }

            $all = Feature::whereIn('food_id', $foods)
                ->whereNotIn("value", $data['yes'])
                ->get();


            $item = array_count_values($foods);
            $count_item = count($data['yes']);

            $item_final = '';
            foreach ($item as $key=>$val ){
                if($count_item == $val && $val > 1) {
                    $item_final = $key;
                }
            }

            if(!empty($item_final) ) {
                $resp = Food::where("id", $item_final)->first();

                return [ "resp" => $resp['value'], 'final' => true];
            }

            if(!empty($data['not'])) {
                foreach ($all as $key=>$item) {
                    $check = $this->removeKeywords($item, $data['not']);
                    if($check) {
                        unset($all[$key]);
                    }
                }



                if(sizeof($all) == 0) {
                    $resp = Food::whereNotIn("value", $data['not'])->first();

                    if(in_array($resp['value'], $data['not'])) {
                        return "-1";
                    }

                    return [ "resp" => $resp['value'], 'final' => true];
                }
            }

            if(empty($resp)) {


                $resp = $all[array_keys(json_decode($all, true))[0]]['value'];
                $final = false;
            }



            return [ "resp" => $resp, 'final' => $final];
        }


    }


    private function removeKeywords($item, $works)
    {
        foreach ($works as $work) {
            if($item['value'] == $work) {
                return true;
            }
        }

        return false;
    }

    public function saveFood($data)
    {
        $count = count($data['not']);
        $new = Food::create([
            'value' => $data['food']
        ]);

        return ["new" => $new, 'last_food'=> $data['not'][$count -1]];
    }

    public function alterFood($data)
    {
       foreach ($data['yes'] as $val) {
            Feature::create([
                'value' => $val,
                'food_id' => $data['id'],
            ]);
        }

        return $data;

    }
}
