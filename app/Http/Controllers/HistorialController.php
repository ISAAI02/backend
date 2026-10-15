<?php

namespace App\Http\Controllers;

use App\Models\Colonia;
use App\Models\Reporte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistorialController extends Controller
{
    public function index(Request $request)
    {
        $query = Reporte::with(['colonia', 'unidad', 'imagenes'])
            ->where('user_id', Auth::id())
            ->orderByDesc('fecha_reporte');

        if ($request->filled('fecha')) {
            $query->whereDate('fecha_reporte', $request->input('fecha'));
        }

        if ($request->filled('colonia_id')) {
            $query->where('colonia_id', $request->input('colonia_id'));
        }

        $reportes = $query->paginate(10)->withQueryString();
        $colonias = Colonia::orderBy('nombre')->get();

        $totalLitrosHoy = Reporte::where('user_id', Auth::id())
            ->whereDate('fecha_reporte', today())
            ->sum('litros_entregados');

        $totalEntregasHoy = Reporte::where('user_id', Auth::id())
            ->whereDate('fecha_reporte', today())
            ->count();

        return view('historial', compact(
            'reportes',
            'colonias',
            'totalLitrosHoy',
            'totalEntregasHoy'
        ));
    }
}