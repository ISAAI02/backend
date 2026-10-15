<?php

namespace Database\Seeders;

use App\Models\Colonia;
use App\Models\ContactoEmergencia;
use App\Models\DetalleOperador;
use App\Models\Reporte;
use App\Models\Role;
use App\Models\Unidad;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Roles
        $rolAdmin = Role::firstOrCreate(['nombre' => 'Administrador']);
        $rolOperador = Role::firstOrCreate(['nombre' => 'Operador']);

        // 2. Unidades (Pipas)
        $pipa04 = Unidad::firstOrCreate(
            ['numero_unidad' => 'PIPA 04'],
            ['placas' => 'LA-48-21', 'capacidad_litros' => 10000, 'estatus' => 'activa']
        );
        Unidad::firstOrCreate(
            ['numero_unidad' => 'PIPA 01'],
            ['placas' => 'LA-10-01', 'capacidad_litros' => 10000, 'estatus' => 'activa']
        );

        // 3. Usuario Operador (con rol_id, unidad_id, nombre, curp, nss, activo)
        $operador = User::updateOrCreate(
            ['email' => 'juan.martinez@cocotitlan.gob.mx'],
            [
                'rol_id'    => $rolOperador->id,
                'unidad_id' => $pipa04->id,
                'nombre'    => 'Juan P. Martínez',
                'password'  => Hash::make('12345678'),
                'telefono'  => '5512345678',
                'curp'      => 'MAPJ850101HMCJRN01',
                'nss'       => '12345678901',
                'activo'    => true,
            ]
        );

        DetalleOperador::updateOrCreate(
            ['user_id' => $operador->id],
            [
                'numero_licencia'   => 'EDOMEX-4821',
                'vigencia_licencia' => '2027-12-31',
            ]
        );

        ContactoEmergencia::updateOrCreate(
            ['user_id' => $operador->id, 'nombre' => 'Protección Civil Cocotitlán'],
            ['telefono' => '5559820000']
        );

        // 4. Colonias
        $colCentro = Colonia::firstOrCreate(['nombre' => 'Colonia Centro'], ['codigo_postal' => '56680']);
        $colJardines = Colonia::firstOrCreate(['nombre' => 'Col. Jardines'], ['codigo_postal' => '56680']);
        $colIndustrial = Colonia::firstOrCreate(['nombre' => 'Col. Industrial'], ['codigo_postal' => '56680']);
        Colonia::firstOrCreate(['nombre' => 'San Andrés Metla'], ['codigo_postal' => '56683']);

        // 5. Reportes de ejemplo
        if (Reporte::count() === 0) {
            Reporte::create([
                'user_id'           => $operador->id,
                'unidad_id'         => $pipa04->id,
                'colonia_id'        => $colCentro->id,
                'direccion'         => 'Calle Hidalgo #123',
                'litros_entregados' => 2500,
                'observaciones'     => 'Entrega sin contratiempos',
                'estatus'           => 'completado',
                'fecha_reporte'     => now()->setTime(10, 30),
            ]);

            Reporte::create([
                'user_id'           => $operador->id,
                'unidad_id'         => $pipa04->id,
                'colonia_id'        => $colJardines->id,
                'direccion'         => 'Av. Morelos #456',
                'litros_entregados' => 3000,
                'observaciones'     => 'Cisterna municipal',
                'estatus'           => 'completado',
                'fecha_reporte'     => now()->setTime(9, 5),
            ]);

            Reporte::create([
                'user_id'           => $operador->id,
                'unidad_id'         => $pipa04->id,
                'colonia_id'        => $colIndustrial->id,
                'direccion'         => 'Blvd. Insurgentes #78',
                'litros_entregados' => 4500,
                'observaciones'     => 'Suministro completo',
                'estatus'           => 'completado',
                'fecha_reporte'     => now()->setTime(8, 20),
            ]);
        }
    }
}