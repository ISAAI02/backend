<nav class="bg-white border-t md:border-t-0 md:border-r border-gray-100 flex md:flex-col justify-around md:justify-start items-center md:items-start py-2 px-2 md:p-6 fixed md:sticky top-auto md:top-0 bottom-0 w-full md:w-64 z-50 h-auto md:h-screen shadow-[0_-5px_10px_rgba(0,0,0,0.02)] md:shadow-none gap-0 md:gap-4">
    
    <div class="hidden md:flex items-center gap-3 mb-8 w-full border-b border-gray-100 pb-6">
        <!-- Asegúrate de que el logo exista en tu carpeta public/img -->
        <img src="{{ asset('img/LOGO_COCO.png') }}" class="w-10 h-10 object-contain">
        <span class="font-extrabold text-[#d6287c] text-sm leading-tight">Agua Móvil<br><span class="text-gray-400 text-xs font-normal">Cocotitlán</span></span>
    </div>

    <a href="/inicio" class="flex flex-col md:flex-row items-center justify-center md:justify-start w-20 md:w-full py-2 md:py-3 md:px-4 rounded-2xl {{ request()->routeIs('inicio') ? 'text-[#d6287c] bg-[#fdf2f8]' : 'text-gray-400 hover:bg-gray-50' }} transition">
        <svg class="w-6 h-6 md:mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
        <span class="text-[0.65rem] md:text-sm font-bold mt-1 md:mt-0">Inicio</span>
    </a>

    <a href="/entrega" class="flex flex-col md:flex-row items-center justify-center md:justify-start w-20 md:w-full py-2 md:py-3 md:px-4 rounded-2xl {{ request()->routeIs('entrega') ? 'text-[#d6287c] bg-[#fdf2f8]' : 'text-gray-400 hover:bg-gray-50' }} transition">
        <svg class="w-6 h-6 md:mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
        <span class="text-[0.65rem] md:text-sm font-bold mt-1 md:mt-0">Entrega</span>
    </a>

 
    <a href="/historial" class="flex flex-col md:flex-row items-center justify-center md:justify-start w-20 md:w-full py-2 md:py-3 md:px-4 rounded-2xl {{ request()->routeIs('historial') ? 'text-[#d6287c] bg-[#fdf2f8]' : 'text-gray-400 hover:bg-gray-50' }} transition">
        <svg class="w-6 h-6 md:mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
        <span class="text-[0.65rem] md:text-sm font-bold mt-1 md:mt-0">Historial</span>
    </a>
</nav>