@extends('layouts.app')

@section('content')
<div class="min-h-screen flex flex-col md:flex-row">
    
    <div class="bg-gradient-to-b from-[#e6328c] to-[#d6287c] min-h-[35vh] md:h-screen md:w-1/2 flex flex-col items-center justify-center p-4 text-center">
        <div class="bg-white p-3 rounded-[1.5rem] shadow-lg mb-3 md:mb-6">
            <img src="{{ asset('img/LOGO_COCO.png') }}" alt="Cocotitlán" class="w-14 h-14 md:w-24 md:h-24 object-contain">
        </div>
        <h1 class="text-white text-xl md:text-4xl font-bold tracking-wide">Agua Móvil Municipal</h1>
        <p class="text-pink-100 text-[0.65rem] md:text-base mt-1 md:mt-2 font-medium">H. Ayuntamiento de Cocotitlán<br>Gobierno Municipal 2025-2027</p>
    </div>

    <div class="bg-white flex-1 rounded-t-[2rem] md:rounded-none -mt-6 md:mt-0 p-6 md:p-16 lg:p-24 shadow-[0_-10px_20px_rgba(0,0,0,0.1)] md:shadow-none relative z-10 flex flex-col justify-center md:w-1/2">
        
        <div class="max-w-sm md:max-w-md w-full mx-auto">
            <h2 class="text-2xl md:text-3xl font-extrabold text-[#1a1a2e] mb-1 md:mb-2">Iniciar Sesión</h2>
            <p class="text-gray-500 text-sm md:text-base mb-6 md:mb-8">Ingresa tus datos de operador</p>

            <form action="#" method="POST" class="space-y-4 md:space-y-5">
                <div>
                    <label class="block text-[0.65rem] md:text-xs font-bold text-gray-500 mb-1.5 tracking-wider uppercase">Usuario / ID Operador</label>
                    <div class="relative">
                        <input type="text" placeholder="ej. juan.martinez" class="w-full bg-[#fdf2f8] border border-pink-100 rounded-2xl py-3 md:py-3.5 px-10 text-gray-700 text-sm focus:outline-none focus:ring-2 focus:ring-pink-400 transition">
                        <span class="absolute left-3.5 top-3 md:top-3.5 text-gray-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        </span>
                    </div>
                </div>

                <div>
                    <label class="block text-[0.65rem] md:text-xs font-bold text-gray-500 mb-1.5 tracking-wider uppercase">Contraseña</label>
                    <div class="relative">
                        <input type="password" placeholder="••••••••" class="w-full bg-[#fdf2f8] border border-pink-100 rounded-2xl py-3 md:py-3.5 px-10 text-gray-700 text-sm focus:outline-none focus:ring-2 focus:ring-pink-400 transition">
                        <span class="absolute left-3.5 top-3 md:top-3.5 text-gray-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        </span>
                    </div>
                </div>

                <button type="submit" class="w-full bg-gradient-to-r from-[#ed3d96] to-[#c92476] text-white font-bold py-3.5 md:py-4 rounded-2xl shadow-md hover:opacity-90 transition mt-4 md:mt-6 text-sm md:text-base">
                    Entrar al Sistema
                </button>
            </form>
            
            <div class="mt-6 md:mt-8 text-center border-t border-gray-100 pt-4">
                <span class="text-[0.7rem] md:text-xs text-gray-400 bg-white px-2">Sistema de Control de Pipas</span>
            </div>
        </div>
        
    </div>
</div>
@endsection