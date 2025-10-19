<?php

namespace App\Http\Controllers;
use App\Models\Author;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::all();

        if($authors->isEmpty()){
            return response()->json([
                'success' => true,
                'message' => 'Resouces data not found'
            ], 200);
        }

        // return view('authors', ['authors' => $authors]);
        return response()->json([
            "success" => true,
            "message" => "Get all resource",
            "data" => $authors
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'photo' => 'required',
            'bio' => 'required|max:255'
        ]);

        if($validator->fails()){
            return response()->json([
                'success' => false,
                'message' => $validator
            ], 200);
        }

        $validateData = $validator->validate();

        Author::create($validateData);
        $authors = Author::all();

        return response()->json([
            'success' => true,
            'message' => 'Add Resource is Success',
            'data' => $authors
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $author = Author::find($id);

        if(!$author){
            $data = [
                'success' => false,
                'message' => 'data not found',
            ];
            return response()->json($data, 404);
        }

        $data = [
            'success' => true,
            'message' => 'data is found',
            'data' => $author
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
        $author = Author::find($id);

        $validator = Validator::make($request->all(), [
            'name' => 'nullable|string|max:255',
            'photo' => 'nullable|string',
            'bio' => 'nullable|string|max:255'
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
            'name' => $input['name'] ?? null ?: $author->name,
            'photo' => $input['photo'] ?? null ?: $author->photo,
            'bio' => $input['bio'] ?? null ?: $author->bio
        ];

        $author->update($dataBaru);
        
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
        $author = Author::find($id);

        if(!$author){
            $data = [
                'success' => false,
                'message' => 'Data not found'
            ];
            return response()->json($data, 404);
        }

        $author->delete();

        $data = [
            'success' => true,
            'message' => 'Resource deleted successfully',
        ];
        return response()->json($data, 200);
    }
}
