<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function login(Request $request) {
        $credentials = $request->only('name', 'password');

        if(!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['errors' => 'failed'], 'failed');
        } 
        return $this->sendResponse(compact('tokens'), 'success');
    }

    public function register(Request $request) {

        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);

        $token = JWTAuth::fromUser($user);

        return response()->json(compact('user','token'),201);
    }

    //
}
