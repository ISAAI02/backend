@extends('layouts.app')

@section('content')
<div class="flex flex-col md:flex-row min-h-screen bg-gray-50 w-full">
    
    <x-bottom-nav />

    <main class="flex-1 overflow-y-auto pb-36 md:pb-8 md:p-8 w-full">
        <div class="max-w-4xl mx-auto">
            
            <div class="bg-[#e6328c] md:rounded-[2rem] pt-8 pb-6 md:pb-10 px-5 md:px-8 text-white shadow-sm transition-all">
                <div class="flex justify-between items-start">
                    <div class="flex items-center gap-2 md:gap-3">
                        <div class="bg-white/20 p-2 md:p-2.5 rounded-lg">
                            <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        </div>
                        <div class="leading-tight">
                            <h2 class="font-extrabold text-sm md:text-lg tracking-wide uppercase">Historial del Día</h2>
                            <p class="text-[0.65rem] md:text-sm text-pink-100">{{ $totalEntregasHoy ?? 0 }} entregas • {{ number_format($totalLitrosHoy ?? 0) }} L suministrados</p>
                        </div>
                    </div>
                    <div class="text-right leading-tight">
                        <p class="font-bold text-sm md:text-lg">{{ now()->format('h:i a') }}</p>
                        <p class="text-[0.65rem] md:text-sm text-pink-100 capitalize">{{ now()->locale('es')->translatedFormat('l, d \d\e F') }}</p>
                    </div>
                </div>
            </div>

            <div class="px-5 md:px-0 mt-6 md:mt-8">
                @if (session('success'))
                    <div class="mb-4 bg-[#e6f7f4] border border-[#00a884]/30 text-[#00a884] text-xs md:text-sm font-bold rounded-2xl p-4">
                        {{ session('success') }}
                    </div>
                @endif

                <h4 class="text-[0.65rem] md:text-sm font-bold text-gray-500 tracking-wider mb-4 uppercase">Entregas Registradas</h4>
                
                <div class="bg-white border border-gray-100 rounded-2xl md:rounded-3xl divide-y divide-gray-50 shadow-sm overflow-hidden">
                    
                    @forelse ($reportes ?? [] as $reporte)
                    <div class="p-4 md:p-5 flex items-center justify-between hover:bg-gray-50 transition-colors">
                        <div class="flex items-center gap-3 md:gap-4">
                            <div class="bg-[#e6f7f4] p-2 md:p-3 rounded-xl text-[#00a884]">
                                <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <div>
                                <p class="font-bold text-[#1a1a2e] text-sm md:text-base">{{ $reporte->direccion }}</p>
                                <p class="text-xs md:text-sm text-gray-500 mt-0.5">{{ $reporte->colonia->nombre ?? '' }} • {{ number_format($reporte->litros_entregados) }} L</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-xs md:text-sm font-bold text-[#1a1a2e]">{{ $reporte->fecha_reporte->format('h:i A') }}</p>
                            <p class="text-[0.65rem] md:text-xs text-[#00a884] font-bold flex items-center justify-end gap-1 mt-1">
                                <svg class="w-3 h-3 md:w-4 md:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                {{ ucfirst($reporte->estatus) }}
                            </p>
                        </div>
                    </div>
                    @empty
                    <div class="p-4 md:p-5 flex items-center justify-between hover:bg-gray-50 transition-colors">
                        <p class="text-xs md:text-sm text-gray-500">Aún no hay entregas registradas.</p>
                    </div>
                    @endforelse

                </div>

                @if(isset($reportes) && method_exists($reportes, 'links'))
                    <div class="mt-4">
                        {{ $reportes->links() }}
                    </div>
                @endif
            </div>

        </div>
    </main>
</div>

<script>
    function actualizarReloj() {
        const ahora = new Date();
        
        // Formatear hora (ej. 03:15 pm)
        let horas = ahora.getHours();
        const minutos = ahora.getMinutes().toString().padStart(2, '0');
        const ampm = horas >= 12 ? 'pm' : 'am';
        horas = horas % 12;
        horas = horas ? horas : 12; // la hora '0' debe ser '12'
        const horaFormateada = `${horas.toString().padStart(2, '0')}:${minutos} ${ampm}`;
        
        // Formatear fecha en español (ej. jueves, 15 de octubre)
        const opcionesFecha = { weekday: 'long', day: 'numeric', month: 'long' };
        const fechaFormateada = ahora.toLocaleDateString('es-ES', opcionesFecha);

        // Inyectar en los elementos HTML
        const elHora = document.getElementById('reloj-hora');
        const elFecha = document.getElementById('reloj-fecha');
        
        if (elHora) elHora.innerText = horaFormateada;
        if (elFecha) elFecha.innerText = fechaFormateada;
    }

    // Ejecutar al cargar y actualizar cada segundo
    actualizarReloj();
    setInterval(actualizarReloj, 1000);
</script>

@endsection