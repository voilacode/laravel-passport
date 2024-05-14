<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str; 
use App\Models\Interaction;

use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request) {
        // Validate request data
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string',
            'password' => 'required|string|min:6',
        ]);

        // Generate a unique slug
        $slug = Str::random(6);

        // Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => \Hash::make($request->password),
            'slug' => $slug,
        ]);

        // Create token
        $token = $user->createToken('Token')->accessToken;

        return response()->json(['token' => $token, 'user' => $user], 200);
    }
    
    public function login(Request $request) {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(auth()->attempt($data)) {
            $token = auth()->user()->createToken('Token')->accessToken;

            return response()->json(['token'=>$token], 200);
        } else {
            return response()->json(['error'=>"Unauthorized Access"], 401);
        }
    }

    public function user(Request $request) {
        $user = auth()->user();
        return response()->json(['user'=>$user],200);
    }

    public function logout(Request $request) {
        $request->user()->token()->revoke();
    
        return response()->json(['message' => 'Successfully logged out'], 200);
    }

    public function saveInteraction(Request $request) {
        $request->validate([
            'client_slug' => 'required|string',
            'name' => 'required|string',
            'phone' => 'required|string',
            'interaction_date' => 'required|date',
            'interaction_type' => 'required|string',
            'interaction_tag' => 'required|string',
            'duration' => 'required|string',
            'caller_name' => 'required|string',
            'caller_phone' => 'required|string',
            'status' => 'required|string',
            'data' => 'nullable|string',
        ]);

        // Save the interaction data
        $interaction = Interaction::create([
            'client_slug' => $request->client_slug,
            'name' => $request->name,
            'phone' => $request->phone,
            'interaction_date' => $request->interaction_date,
            'interaction_type' => $request->interaction_type,
            'interaction_tag' => $request->interaction_tag,
            'duration' => $request->duration,
            'caller_name' => $request->caller_name,
            'caller_phone' => $request->caller_phone,
            'status' => $request->status,
            'data' => $request->data ? $request->data : null,
        ]);

        if ($interaction) {
            return response()->json(['message' => 'Interaction saved successfully'], 200);
        } else {
            return response()->json(['error' => 'Failed to save interaction'], 500);
        }
    }

}
