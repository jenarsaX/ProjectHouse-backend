<?php

namespace App\Http\Controllers;

use App\Http\Requests\PagoRequest;
use App\Models\Pago;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    public function index()
    {
        $pago = Pago::all();
        return response()->json([
            'message' => true,
            'data' => $pago
        ]);
    }

    public function store(PagoRequest $request)
    {
        $pago = Pago::create([
            'renta' => $request->input('renta'),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Renta creada',
            'data' => $pago
        ]);
    }

    public function show(string $id)
    {
        $pago = Pago::findOrfail($id);

        return response()->json([
            'meesage' => true,
            'data' => $pago
        ]);
    }

    public function update(PagoRequest $request, string $id)
    {
        $pago = Pago::find($id);
        if (!$pago) {
            return response()->json(['message' => 'Renta no encontrado'], 404);
        }
        $pago->renta = $request->input('Renta');
        $pago->save();

        return response()->json([
            'success' => true,
            'message' => 'Renta actualizada',
            'data' => $pago
        ]);
    }

    public function destroy(string $id)
    {
        Pago::find($id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Renta eliminada',
        ]);
    }
}
