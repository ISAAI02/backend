@extends('layouts.app')

@section('content')
<div class="flex flex-col md:flex-row min-h-screen bg-gray-50 w-full">

    <x-bottom-nav />

    <main class="flex-1 overflow-y-auto pb-36 md:pb-8 md:p-8 w-full">
        <div class="max-w-2xl mx-auto">

            <div class="bg-[#e6328c] md:rounded-[2rem] pt-8 pb-6 px-5 md:px-8 text-white shadow-sm">
                <h1 class="text-lg md:text-2xl font-extrabold">Registrar Nueva Entrega</h1>
                <p class="text-xs md:text-sm text-pink-100 mt-1">Completa los datos del suministro de agua potable</p>
            </div>

            <div class="px-5 md:px-0 mt-5">
                @if ($errors->any())
                    <div class="mb-4 bg-red-50 border border-red-200 text-red-600 text-xs md:text-sm rounded-2xl p-4">
                        <ul class="list-disc pl-4 space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('entrega.store') }}" method="POST" enctype="multipart/form-data" class="bg-white border border-gray-100 rounded-2xl md:rounded-3xl p-5 md:p-8 shadow-sm space-y-5">
                    @csrf

                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1.5">Unidad / Pipa</label>
                        <select name="unidad_id" required class="w-full bg-[#fdf2f8] border border-pink-100 rounded-2xl py-3 px-4 text-gray-700 text-sm focus:outline-none focus:ring-2 focus:ring-pink-400">
                            <option value="">Selecciona una unidad...</option>
                            @foreach ($unidades ?? [] as $unidad)
                                <option value="{{ $unidad->id }}" {{ old('unidad_id', auth()->user()?->unidad_id) == $unidad->id ? 'selected' : '' }}>
                                    {{ $unidad->numero_unidad }} ({{ number_format($unidad->capacidad_litros) }} L)
                                </option>
                            @endforeach
                        </select>
                    </div>  

                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1.5">Colonia</label>
                        <select name="colonia_id" required class="w-full bg-[#fdf2f8] border border-pink-100 rounded-2xl py-3 px-4 text-gray-700 text-sm focus:outline-none focus:ring-2 focus:ring-pink-400">
                            <option value="">Selecciona la colonia...</option>
                            @foreach ($colonias ?? [] as $colonia)
                                <option value="{{ $colonia->id }}" {{ old('colonia_id') == $colonia->id ? 'selected' : '' }}>
                                    {{ $colonia->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1.5">Dirección (Calle y Número)</label>
                        <input type="text" name="direccion" value="{{ old('direccion') }}" required placeholder="Ej. Calle Hidalgo #123" class="w-full bg-[#fdf2f8] border border-pink-100 rounded-2xl py-3 px-4 text-gray-700 text-sm focus:outline-none focus:ring-2 focus:ring-pink-400">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1.5">Litros Entregados</label>
                        <input type="number" name="litros_entregados" value="{{ old('litros_entregados', 1000) }}" min="1" required placeholder="Ej. 2500" class="w-full bg-[#fdf2f8] border border-pink-100 rounded-2xl py-3 px-4 text-gray-700 text-sm focus:outline-none focus:ring-2 focus:ring-pink-400">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1.5">Observaciones (Opcional)</label>
                        <textarea name="observaciones" rows="3" placeholder="Notas adicionales de la entrega..." class="w-full bg-[#fdf2f8] border border-pink-100 rounded-2xl py-3 px-4 text-gray-700 text-sm focus:outline-none focus:ring-2 focus:ring-pink-400">{{ old('observaciones') }}</textarea>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1.5">Fotografías de Evidencia</label>
                        <input type="file" name="imagenes[]" multiple accept="image/*" class="w-full bg-[#fdf2f8] border border-pink-100 rounded-2xl py-2.5 px-4 text-gray-700 text-xs file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-[#e6328c] file:text-white hover:file:opacity-90">
                    </div>

                    <button type="submit" class="w-full bg-gradient-to-r from-[#ed3d96] to-[#c92476] text-white font-bold py-4 rounded-2xl shadow-lg hover:opacity-90 transition cursor-pointer">
                        Guardar Entrega
                    </button>
                </form>
            </div>

        </div>
    </main>
</div>
@endsection