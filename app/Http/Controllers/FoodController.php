<?php

namespace App\Http\Controllers;

use App\Http\Repositories\FoodRepository;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    //
    public function index()
    {
        return view('index');
    }

    public function ajaxSearchFood(Request $request, FoodRepository $repository)
    {
        $resp = $repository->searchFood($request->all());

        return $resp;
    }

    public function saveFood(Request $request, FoodRepository $repository)
    {
        $resp = $repository->saveFood($request->all());

        return $resp;
    }

    public function updateFood(Request $request, FoodRepository $repository)
    {
        $resp = $repository->alterFood($request->all());

        return $resp;
    }
}
