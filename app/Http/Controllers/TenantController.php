<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    public function index()
    {
        $tenant = Tenant::all();

        return response()->json([
            'success' => true,
            'data' => $tenant
        ],200);
    }

    public function store(Request $request)
    {
        $tenant = Tenant::create([
            'name' => $request->input('name'),
            'dni' => $request->input('dni'),
            'telefono' => $request->input('telefono'),
            'email' => $request->input('email'),
            'fecha_nacimiento' => $request->input('facha_nacimiento'),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Actulizado Correctamente',
            'data' => $tenant
        ],201);
    }

    public function show(string $id)
    {
        $tenant = Tenant::find($id);

        return response()->json([
            'success' => true,
            'data' => $tenant
        ],200);
    }

    public function update(Request $request, string $id)
    {
        $tenant = Tenant::find($id);
        if(!$tenant){
            return response()->json(['message' => 'No encontrado'],404);
        }
        
        $tenant->name = $request->input('name');
        $tenant->dni = $request->input('dni');
        $tenant->telefono = $request->input('telefono');
        $tenant->email = $request->input('email');
        $tenant->fecha_nacimiento = $request->input('fecha_nacimiento');
        $tenant->save();

        return response()->json([
            'success' => true,
            'data' => $tenant
        ],201);
    }

    public function destroy(string $id)
    {
        Tenant::find($id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Eliminado correctamente',
        ],200);
    }
}
