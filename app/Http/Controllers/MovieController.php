<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Validator;

class MovieController extends Controller
{
    public function index(){
        $records = Movie::all();
        return view("index",compact("records"));
    }

    public function create(){
        return view("create");
    }

    public function store(Request $request){

        $validate = $request->validate(
            [
                "title" => 'required|unique:movies,title',
                "image_url" => 'required|url',
                "published_year" => 'required|numeric',
                "is_showing" => 'required',
                "description" => 'required',    
            ]
            );

        $newMovie = Movie::create([
            "title" => $validate['title'],
            "image_url" => $request->image_url,
            "published_year" => $request->published_year,
            "is_showing" => $request->is_showing,
            "description" => $request->description,
        ]);

        // $newMovie = Movie::create([
        //     "title" => $validate['title'],
        //     "image_url" => $validate['image_url'],
        //     "published_year" => $validate['published_year'],
        //     "is_showing" => $validate['is_showong'],
        //     "description" => $validate['description'],
        // ]);
        // $newMovie->save();

        return redirect("admin/movies/index");
    }
}
