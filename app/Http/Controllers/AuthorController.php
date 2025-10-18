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
