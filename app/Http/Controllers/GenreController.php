<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genres = Genre::all();

        if($genres->isEmpty()){
            return response()->json([
                'success' => true,
                'message' => "Resouces data not found"
            ], 400);
        }

        // return view('genre', ['genres' => $genres]);
        return response([
            "success" => true,
            "message" => "Get all resource",
            "data" => $genres
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required|max:255'
        ]);

        if ($validator->fails()){
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        };

        $validateData = $validator->validated();

        Genre::create($validateData);
        $genres = Genre::all();

        return response()->json([
            'success' => true,
            'message' => 'Add Resources Is Success',
            'data' => $genres
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
