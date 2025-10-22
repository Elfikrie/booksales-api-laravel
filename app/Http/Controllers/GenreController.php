<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use GuzzleHttp\Promise\Create;
use Illuminate\Auth\Events\Failed;
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

        $newGenre = Genre::create($validateData);

        return response()->json([
            'success' => true,
            'message' => 'Add Resources Is Success',
            'data' => $newGenre
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $genre = Genre::find($id);

        if(!$genre){
            $data = [
                'success' => false,
                'message' => 'data not found',
            ];
            return response()->json($data, 404);
        }

        $data = [
            'success' => true,
            'message' => 'data is found',
            'data' => $genre
        ];

        return response()->json($data, 200);
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
        $genre = Genre::find($id);

        if(!$genre){
            return response()->json([
                'success' => false,
                'message' => "Data not found"
            ], 404);
        }

        $validator = Validator::make($request->all(),[
            'name' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255'
        ]);

        if($validator->fails()){
            return response()->json([
                'success' => false,
                'message' => 'data is wrong',
                'data' => $validator
            ], 422);
        }

        $input = $validator->validated();

        $dataBaru = [
            'name' => $input['name'] ?? null ?: $genre->name,
            'description' => $input['description'] ?? null ?: $genre->description,
        ];

        $genre->update($dataBaru);
        
        return response()->json([
            'success' => true,
            'message' => 'Successfully to update data',
            'data' => $dataBaru
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $genre = Genre::find($id);

        if(!$genre){
            $data = [
                'success' => false,
                'message' => 'Data not found'
            ];
            return response()->json($data, 404);
        }

        $genre->delete();

        $data = [
            'success' => true,
            'message' => 'Resource deleted successfully',
            'data' => $genre
        ];
        return response()->json($data, 200);
    }
}
