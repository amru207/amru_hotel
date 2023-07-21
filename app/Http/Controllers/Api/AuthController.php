<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\User;


class AuthController extends Controller
{
    function registrasi(Request $request){
        $validate = Validator::make($request->all(), [
            'name' => 'required|min:5',
            'email' => 'required|email|unique:users,email',
            'password' => 'required'
        ]);
        if ($validate->fails()) {
            return $validate->errors();
        }
        // proses simpan data
        $data = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        return response()->json([
            'pesan' => 'Data berhasil disimpan',
            'data' => $data
        ], 201);
    }

    function login(Request $request){
        $validate = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validate->fails()) {
            return $validate->errors();
        }

        $credentials = request(['email', 'password']);
        if (!auth()->attempt($credentials)) {
            return response()->json([
                'pesan' => 'Username atau password salah.!',
            ], 422);
        }

        $user = User::where('email', $request->email)->first();
        $token = $user->createToken('auth-token')->plainTextToken;

        return response()->json([
            'access-token' => $token
        ], 200);
    }
}
