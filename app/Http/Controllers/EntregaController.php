<?php

namespace App\Http\Controllers;

use App\Models\Colonia;
use App\Models\Reporte;
use App\Models\ReporteImagen;
use App\Models\Unidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EntregaController extends Controller
{
    public function create()
    {
        $user = Auth::user()->load('unidad');
        $colonias = Colonia::orderBy('nombre')->get();
        $unidades = Unidad::where('estatus', 'activa')->orderBy('numero_unidad')->get();

        return view('entrega', compact('user', 'colonias', 'unidades'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'unidad_id'         => ['required', 'exists:unidades,id'],
            'colonia_id'        => ['required', 'exists:colonias,id'],
            'direccion'         => ['required', 'string', 'max:255'],
            'litros_entregados' => ['required', 'integer', 'min:1'],
            'observaciones'     => ['nullable', 'string', 'max:1000'],
            'estatus'           => ['nullable', 'string', 'max:30'],
            'imagenes.*'        => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:5120'],
        ]);

        DB::transaction(function () use ($validated, $request) {
            $reporte = Reporte::create([
                'user_id'           => Auth::id(),
                'unidad_id'         => $validated['unidad_id'],
                'colonia_id'        => $validated['colonia_id'],
                'direccion'         => $validated['direccion'],
                'litros_entregados' => $validated['litros_entregados'],
                'observaciones'     => $validated['observaciones'] ?? null,
                'estatus'           => $validated['estatus'] ?? 'completado',
                'fecha_reporte'     => now(),
            ]);

            if ($request->hasFile('imagenes')) {
                foreach ($request->file('imagenes') as $imagen) {
                    $ruta = $imagen->store('evidencias', 'public');
                    $pesoKb = (int) round($imagen->getSize() / 1024);

                    ReporteImagen::create([
                        'reporte_id'   => $reporte->id,
                        'ruta_archivo' => $ruta,
                        'peso_kb'      => $pesoKb,
                    ]);
                }
            }
        });

        return redirect()
            ->route('historial')
            ->with('success', '¡Entrega registrada correctamente!');
    }
}