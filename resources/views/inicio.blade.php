@extends('layouts.app')

@section('content')
<div class="flex flex-col md:flex-row min-h-screen bg-gray-50 w-full">
    
    <x-bottom-nav />

    <main class="flex-1 overflow-y-auto pb-36 md:pb-8 md:p-8 w-full">
        <div class="max-w-4xl mx-auto">
            
            <div class="bg-[#e6328c] md:rounded-[2rem] pt-8 pb-6 md:pb-10 px-5 md:px-8 text-white shadow-sm transition-all">
                <div class="flex justify-between items-start mb-6 md:mb-8">
                    <div class="flex items-center gap-2 md:gap-3">
                        <div class="bg-white/20 p-2 md:p-2.5 rounded-lg">
                            <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        </div>
                        <div class="leading-tight">
                            <h2 class="font-extrabold text-sm md:text-lg tracking-wide uppercase">Agua Móvil</h2>
                            <p class="text-[0.65rem] md:text-sm text-pink-100">Sistema Municipal</p>
                        </div>
                    </div>
                    <div class="text-right leading-tight">
                        <p class="font-bold text-sm md:text-lg">05:53 p.m.</p>
                        <p class="text-[0.65rem] md:text-sm text-pink-100">Viernes, 11 De Septiembre</p>
                    </div>
                </div>

                <div class="bg-white/10 border border-white/20 rounded-2xl p-3 md:p-6 flex flex-col gap-2.5 md:gap-4 relative overflow-hidden backdrop-blur-sm">
                     <div class="flex items-center gap-2 md:gap-4">
                        <div class="bg-[#0088cc] text-white font-bold text-base md:text-2xl h-10 w-10 md:h-16 md:w-16 rounded-xl flex-shrink-0 flex items-center justify-center shadow-inner">
                            JP
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3 class="font-extrabold text-sm md:text-2xl truncate">Juan P. Martínez</h3>
                            <p class="text-[0.65rem] md:text-sm text-pink-100 mt-0.5 truncate">Operador Certificado • ID #4821</p>
                        </div>
                        <div class="bg-green-400/20 border border-green-400/50 text-green-100 text-[0.6rem] md:text-xs font-bold px-2 py-1 md:px-4 md:py-2 rounded-full flex-shrink-0 flex items-center gap-1 md:gap-2">
                            <div class="w-1.5 h-1.5 md:w-2 md:h-2 bg-green-400 rounded-full animate-pulse"></div> En Servicio
                        </div>
                    </div>
                    <div class="border-t border-white/20 pt-3 md:pt-4 flex items-center gap-2 text-xs md:text-sm font-medium">
                        <svg class="w-4 h-4 md:w-5 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                        PIPA 04 <span class="text-pink-100 font-normal">· Agua Potable Municipal</span>
                    </div>
                </div>
            </div> 
            
            <div class="px-5 md:px-0 mt-3 md:mt-6 relative z-10 flex flex-col md:flex-row gap-3 md:gap-5">
                <a href="/entrega" class="flex-1 bg-gradient-to-r from-[#ed3d96] to-[#c92476] text-white font-bold py-4 md:py-5 rounded-2xl shadow-lg flex justify-center items-center gap-2 hover:opacity-90 transition md:hover:-translate-y-1">
                    <svg class="w-5 h-5 md:w-6 md:h-6 text-pink-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Empezar Nueva Entrega
                </a>
                <a href="/historial" class="flex-1 bg-white text-[#1a1a2e] border border-gray-100 font-bold py-4 md:py-5 rounded-2xl shadow-sm flex justify-center items-center gap-2 hover:bg-gray-50 transition md:hover:-translate-y-1">
                    <svg class="w-5 h-5 md:w-6 md:h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    Ver Historial del Día
                </a>
            </div>

            <div class="px-5 md:px-0 mt-8 md:mt-12">
                <h4 class="text-[0.65rem] md:text-sm font-bold text-gray-500 tracking-wider mb-4 uppercase">Última Actividad</h4>
                
                <div class="bg-white border border-gray-100 rounded-2xl md:rounded-3xl divide-y divide-gray-50 shadow-sm overflow-hidden">
                    
                    <div class="p-4 md:p-5 flex items-center justify-between hover:bg-gray-50 transition-colors">
                        <div class="flex items-center gap-3 md:gap-4">
                            <div class="bg-[#e6f7f4] p-2 md:p-3 rounded-xl text-[#00a884]">
                                <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <div>
                                <p class="font-bold text-[#1a1a2e] text-sm md:text-base">Calle Hidalgo #123</p>
                                <p class="text-xs md:text-sm text-gray-500 mt-0.5">Colonia Centro</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-xs md:text-sm font-bold text-[#1a1a2e]">10:30 AM</p>
                            <p class="text-[0.65rem] md:text-xs text-[#00a884] font-bold flex items-center justify-end gap-1 mt-1">
                                <svg class="w-3 h-3 md:w-4 md:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                Completado
                            </p>
                        </div>
                    </div>

                    <div class="p-4 md:p-5 flex items-center justify-between hover:bg-gray-50 transition-colors">
                        <div class="flex items-center gap-3 md:gap-4">
                            <div class="bg-[#e6f7f4] p-2 md:p-3 rounded-xl text-[#00a884]">
                                <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <div>
                                <p class="font-bold text-[#1a1a2e] text-sm md:text-base">Av. Morelos #456</p>
                                <p class="text-xs md:text-sm text-gray-500 mt-0.5">Col. Jardines</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-xs md:text-sm font-bold text-[#1a1a2e]">09:05 AM</p>
                            <p class="text-[0.65rem] md:text-xs text-[#00a884] font-bold flex items-center justify-end gap-1 mt-1">
                                <svg class="w-3 h-3 md:w-4 md:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                Completado
                            </p>
                        </div>
                    </div>

                    <div class="p-4 md:p-5 flex items-center justify-between hover:bg-gray-50 transition-colors">
                        <div class="flex items-center gap-3 md:gap-4">
                            <div class="bg-[#e6f7f4] p-2 md:p-3 rounded-xl text-[#00a884]">
                                <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <div>
                                <p class="font-bold text-[#1a1a2e] text-sm md:text-base">Blvd. Insurgentes #78</p>
                                <p class="text-xs md:text-sm text-gray-500 mt-0.5">Col. Industrial</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-xs md:text-sm font-bold text-[#1a1a2e]">08:20 AM</p>
                            <p class="text-[0.65rem] md:text-xs text-[#00a884] font-bold flex items-center justify-end gap-1 mt-1">
                                <svg class="w-3 h-3 md:w-4 md:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                Completado
                            </p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </main>
</div>
@endsection