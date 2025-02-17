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
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
