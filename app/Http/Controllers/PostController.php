<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index');
    }

    public function create()
    {
        return view('posts.create');
    }

    public function show(int $id)
    {
        return view('posts.show', ["id" => $id]);
    }

    public function edit(int $id)
    {
        return view('posts.edit', ["id" => $id]);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|max:255',
            'password' => 'required'
        ]);

        return response()->json([
            'message' => 'successful store',
            'data' => $validatedData
        ], 201);

    }
    public function update(Request $request, $id)
    {

        return response()->json([
            'message' => 'updated successfully',
            'data' => ['id' => $id, 'email' => $request->email, 'password' => $request->password]
        ], 201);
    }

    public function destroy(Request $request, $id)
    {
        return response()->json([
            'message' => 'deleted successfully',
            'data' => ['id' => $id, 'email' => $request->email, 'password' => $request->password]
        ], 201);

    }

}
