<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'pagos']);
        Permission::create(['name' => 'reclamos']);
        Permission::create(['name' => 'consultas']);
        Permission::create(['name' => 'solicitudes']);

        //Cliente generico
        $cliente = Role::create(['name' => 'Cliente']);

        $cliente->givePermissionTo([
            'solicitudes'
        ]);

        //Cliente Aprobado
        $clienteap = Role::create(['name' => 'Cliente Aprobado']);

        $clienteap->givePermissionTo([
            'solicitudes',
            'pagos'
        ]);

        //Suscriptor
        $suscriptor = Role::create(['name' => 'Suscriptor']);

        $suscriptor->givePermissionTo([
            'solicitudes',
            'pagos',
            'reclamos',
            'consultas'
        ]);
    }
}
