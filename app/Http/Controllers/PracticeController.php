<?php

namespace App\Http\Controllers;

use App\Models\Practice;
use Illuminate\Http\Request;

class PracticeController extends Controller
{
    public function sample()
    {
        return view('practice');
    }

	  public function sample2()
    {
        $testParam = 'practice2';
		    return view("practice2",compact("testParam"));
    }

    public function sample3()
    {
        $testParam = 'test';
		    return view("practice3",compact("testParam"));
    }

    public function getPractice()
    {
        $practice = Practice::all();
		    return response()->json($practice);
    }
}
