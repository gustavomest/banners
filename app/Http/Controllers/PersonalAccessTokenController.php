<?php

namespace App\Http\Controllers;

use App\Models\PersonalAccessToken;
use Illuminate\Http\Request;

class PersonalAccessTokenController extends Controller
{
    /**
     * Display a listing of the personal access tokens.
     */
    public function index()
    {
        $tokens = PersonalAccessToken::all();
        return response()->json($tokens);
    }

    /**
     * Store a newly created personal access token in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tokenable_type' => 'required|string',
            'tokenable_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'abilities' => 'nullable|string',
            'expires_at' => 'nullable|date',
        ]);

        $token = PersonalAccessToken::create([
            'tokenable_type' => $request->tokenable_type,
            'tokenable_id' => $request->tokenable_id,
            'name' => $request->name,
            'token' => bin2hex(random_bytes(32)), // Gera um token único
            'abilities' => $request->abilities,
            'expires_at' => $request->expires_at,
        ]);

        return response()->json($token, 201);
    }

    /**
     * Display the specified personal access token.
     */
    public function show($id)
    {
        $token = PersonalAccessToken::findOrFail($id);
        return response()->json($token);
    }

    /**
     * Update the specified personal access token in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'abilities' => 'nullable|string',
            'expires_at' => 'nullable|date',
        ]);

        $token = PersonalAccessToken::findOrFail($id);
        $token->update($request->only(['name', 'abilities', 'expires_at']));

        return response()->json($token);
    }

    /**
     * Remove the specified personal access token from storage.
     */
    public function destroy($id)
    {
        $token = PersonalAccessToken::findOrFail($id);
        $token->delete();

        return response()->json(null, 204);
    }
}
