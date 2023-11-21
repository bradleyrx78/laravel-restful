<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(){
        $movies = Movie::all();
        return response()->json($movies);
    }

    public function store(Request $request){
        $movie = new Movie;
        $movie->name = $request->name;
        $movie->genre = $request->genre;
        $movie->release_date = $request->release_date;
        $movie->save();

        return response()->json([
            "message" => "Movie added successfully."
        ], 201);
    }

    public function show($id){

        $movie = Movie::find($id);
        if(!empty($movie)){
            return response()->json($movie);
        }else{
            return response()->json([
                "message" => "Uh-oh, movie not found."
            ], 404);
        }
    }

    public function update(Request $request, $id){
        
        if(Movie::where('id', $id)->exists()){

            $movie = Movie::find($id);
            $movie->name = is_null($request->name) ? $movie->name : $request->name;
            $movie->genre = is_null($request->genre) ? $movie->genre : $request->genre;
            $movie->release_date = is_null($request->release_date) ? $movie->release_date : $request->release_date;
            $movie->save();
            
            return response()->json([
                "message" => "Movie updated successfully."
            ], 404);

        }else{
    
            return response()->json([
                "message" => "Uh-oh, movie not found."
            ], 404);

        }
    }

    public function destroy($id){

        if(Movie::where('id', $id)->exists()){
            $movie = Movie::find($id);
            $movie->delete();

            return response()->json([
                "message" => "Records deleted."
            ], 202);
        } else {
            
            return response()->json([
                'message' => "Movie record not found."
            ], 404);
            
        }
    }
}
