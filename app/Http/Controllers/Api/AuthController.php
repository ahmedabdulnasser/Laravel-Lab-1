<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Register api.
     *
     * @return Response
     */
    public function register(Request $request): JsonResponse
    {
        /** @var \Illuminate\Validation\Validator $validator */
        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Fix: Get validated data using ->validated() on the request after validation
        $data = $request->only(['name', 'email', 'password']);
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        $success['token'] = $user->createToken('blog_app')->plainTextToken;
        $success['name'] = $user->name;

        return new JsonResponse($success, 201);
    }

    /**
     * Login api.
     *
     * @return Response
     */
    public function login(Request $request): JsonResponse
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $success['token'] = $user->createToken('blog_app')->plainTextToken;
            $success['name'] = $user->name;

            return new JsonResponse($success, 200);
        }

        return new JsonResponse(['message' => 'Invalid Credentials'], 401);
    }
}
