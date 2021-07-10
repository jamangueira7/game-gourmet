<?php

namespace App\Http\Controllers;

use App\Http\Repositories\QuestionRepository;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    //
    public function index()
    {
        return view('index');
    }

    public function ajaxSearchQuestion(Request $request, QuestionRepository $repository)
    {
        return $request->all();
    }
}
