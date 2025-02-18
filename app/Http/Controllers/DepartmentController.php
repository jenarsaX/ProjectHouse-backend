<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
{
    public function index()
    {
        $department = Department::all();

        return response()->json([
            'success' => true,
            'data' => $department,
        ],200);
    }

    public function store(Request $request)
    {
        $department = Department::create([
            'name' => $request->input('name'),
            'tamaño' => $request->input('tamaño'),
            'precio' => $request->input('precio'),
            'estatus' => $request->input('estatus'),
            'description' => $request->input('description'),
            'fecha_agregado' => $request->input('fecha_agregado'),
            'pisos' => $request->input('pisos'),
            'id_administrador' => Auth::user()->id,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Creado correctamente',
            'data' => $department
        ],201);
    }

    public function show(string $id)
    {
        $department = Department::find($id);

        return response()->json([
            'success' => true,
            'data' => $department
        ],200);
    }

    public function update(Request $request, string $id)
    {
        $department = Department::find($id);
        if(!$department){
            return response()->json(['message' => 'No encontrado'], 404);
        }

        $department->name = $request->input('name');
        $department->tamaño = $request->input('tamaño');
        $department->precio = $request->input('precio');
        $department->estatus = $request->input('estatus');
        $department->description = $request->input('description');
        $department->fecha_agregado = $request->input('fecha_agregado');
        $department->pisos = $request->input('pisos');
        $department->id_administrador = Auth::user()->id;
        $department->save();

        return response()->json([
            'success' => true,
            'data' => $department,
        ]);
    }

    public function destroy(string $id)
    {
        Department::find($id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Eliminado correctamente',
        ],200);
    }
}
