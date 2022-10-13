<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// use Validator;

class MovieController extends Controller
{
    public function index(Request $request){
        $records = Movie::all();
        $keyword = $request->input('keyword');
        $status = $request->input('status');

        $query = Movie::query();
        if($keyword){
            $spaceConversion = mb_convert_kana($keyword, 's');

            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);

            foreach($wordArraySearched as $value){
                // $query->where('title','like','%'.$value.'%')
                $query->where(DB::raw("CONCAT(title,'',description)"),'like','%'.$value.'%');
            }
        }

        if(isset($status)){
            $query->where("is_showing", $status);
            if($status == 3 || $status === 0){
                $query->get();
            }
        }

        $records = $query->get();

        return view("movie.index",compact("records","keyword","status"));
    }

    public function show($id)
    {
        $record = Movie::findOrFail($id);
        $schedules = $record->schedules;
        // dd($schedules); 
        return view("movie.show",compact("record","schedules"));
    }

    public function create(){
        return view("movie.create");
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
        return view("movie.edit",compact("record"));
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
