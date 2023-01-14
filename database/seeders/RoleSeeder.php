<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $directorGeneral = Role::create([
            'name' => 'Director General',
            'description' => 'Todos los privilegios'
        ]);
        $construction = Role::create([
            'name' => 'Construcción',
            'description' => 'Solo el área de construcción'
        ]);
        $study = Role::create([
            'name' => 'Estudios',
            'description' => 'Solo el área de estudios'
        ]);
        $supervision = Role::create([
            'name' => 'Supervisión',
            'description' => 'Solo el área de supervisión'
        ]);

        /** Director General */
        $Pmanagerial = Permission::create(['name' => 'all.managerial',
                            'description' => 'Área Gerencial'])->syncRoles([$directorGeneral]);

        /** Construcción */
        $Pconstruction = Permission::create(['name' => 'all.construction',
                            'description' => 'Área de Construcción'])->syncRoles([$construction]);
        /** END Construcción */

        /** Estudios */
        $Pstudy = Permission::create(['name' => 'all.study',
                            'description' => 'Área de Estudio'])->syncRoles([$study]);
        /** END Estudios */

        /** Supervisión */
        $Psupervision = Permission::create(['name' => 'all.supervision',
                            'description' => 'Área de Supervisión'])->syncRoles([$supervision]);
        /** END Supervisión */

       /*  $directorGeneral->syncPermissions('all.managerial');
        $construction->syncPermissions($Pconstruction);
        $study->syncPermissions($Pstudy);
        $supervision->syncPermissions($Psupervision); */
    }
}
