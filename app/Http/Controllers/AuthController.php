<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function index()
    {
        $user = User::all();

        return response()->json([
            'success' => true,
            'data' => $user,
        ], 200);
    }

    public function register(Request $request)
    {
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'dni' => $request->input('dni'),
            'phone' => $request->input('phone'),
            'date_nac' => $request->input('date_nac'),
        ]);

        return response()->json([
            'success' => true,
            'data' => $user,
        ], 201);
    }

    public function show(string $id)
    {
        $user = User::find($id);

        return response()->json([
            'success' => true,
            'message' => 'Usuario Encontrado',
            'data' => $user,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }
        $user->name = $request->input('name', $user->name);
        $user->email = $request->input('email', $user->email);
        if ($request->has('password') && $request->input('password')) {
            $user->password = Hash::make($request->input('password'));
        }
        $user->dni = $request->input('dni', $user->dni);
        $user->phone = $request->input('phone', $user->phone);
        $user->date_nac = $request->input('date_nac', $user->date_nac);
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'Actualizado correctamente',
            'data' => $user,
        ], 200);
    }

    public function destroy(string $id)
    {
        $user = User::find($id)->delete();

        return response()->json([
            'success' => true,
            'data' => $user
        ], 200);
    }

    public function login(Request $request){
        $credentials = $request->only('email', 'password');
        if(!Auth::attempt($credentials)){
            return response([
                'message' => 'Credenciales incorrectas',
            ], Response::HTTP_FORBIDDEN);
        }
        $user = Auth::user();

        if(!$user->active){
            return response()->json([
                'message' => 'Tu cuenta ha sido desactivada, Contacta a soporte.'
            ], Response::HTTP_FORBIDDEN);
        }

        $token = $request->user()->createToken($user->emai . '_Token')->plainTextToken;
        $cookie = cookie('jwt', $token, 60*24);
        return response()->json([
            'success' => true,
            'token' => $token,
            'user' => $user,
        ],200)->withCookie($cookie);
    }

    public function user(){
        return Auth::user();
    }

    public function logout(Request $request){
        if($request->user()){
            $request->user()->currentAccessToken()->delete();
        }

        return response()->json([
            'success' => true,
            'message' => 'La salida fue correcta',
        ],200);
    }
}
