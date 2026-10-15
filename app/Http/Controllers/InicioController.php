<?php

namespace App\Http\Controllers;

use App\Models\Reporte;
use Illuminate\Support\Facades\Auth;

class InicioController extends Controller
{
    public function index()
    {
        $user = Auth::user()->load(['rol', 'unidad', 'detalleOperador', 'contactosEmergencia']);

        $ultimosReportes = Reporte::with(['colonia', 'unidad'])
            ->where('user_id', $user->id)
            ->orderByDesc('fecha_reporte')
            ->take(5)
            ->get();

        $unidadActual = $user->unidad ?? $ultimosReportes->first()?->unidad;

        return view('inicio', compact('user', 'ultimosReportes', 'unidadActual'));
    }
}