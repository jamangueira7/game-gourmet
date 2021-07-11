<?php

namespace App\Http\Repositories;

use App\Http\Models\Question;

class QuestionRepository
{
    public function searchQuestion($data)
    {
        $resp = '';

        if($data['choise'] == 'yes') {

            $resp = Question::where('type', strtolower($data['question']))
                ->where('id','!=', $data['questionID'])
                ->first();

        } else {
            if(!empty($data['type'])) {
                $resp = Question::where('type', '!=', strtolower($data['question']))
                    ->first();
            } else {
                $resp = Question::where('type', '!=', strtolower($data['question']))
                    ->first();
            }

        }

        return !empty($resp) ? [$resp, $data] : "response";
    }
}
