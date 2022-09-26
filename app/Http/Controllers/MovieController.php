<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
// use Validator;

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

        return redirect("admin/movies/index");
    }

    public function edit($id){
        $record = Movie::findOrFail($id);
        return view("edit",compact("record"));
    }

    public function update($id, Request $request){
        $record = Movie::findOrFail($id);


        $validate = $request->validate(
            [
                "title" => 'required|unique:movies,title',
                "image_url" => 'required|url',
                "published_year" => 'required|numeric',
                "is_showing" => 'required',
                "description" => 'required',    
            ]
            );

        $record = $record->update([
            "title" => $validate['title'],
            "image_url" => $request->image_url,
            "published_year" => $request->published_year,
            "is_showing" => $request->is_showing,
            "description" => $request->description,
        ]);

        // dd($record);

        return redirect("admin/movies/index");
    }

    public function destroy($id){
        $record = Movie::findOrFail($id);
        $record->delete();
        return redirect("admin/movies/index");
    }
}
