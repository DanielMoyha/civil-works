<?php

namespace Database\Seeders;

use App\Models\Material;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaterialsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $materials = [
            [
                'name' => 'MAMPOSTERIA DE PIEDRA CORTADA TIPO A MORT. 1:4 CON ADITIVO ACELERADOR DE FRAGUADO',
                'quantity' => '200',
                'remarks' => '',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'MAMPOSTERIA DE PIEDRA BRUTA TIPO B MORT 1:4 C/ 1 CARA ENCOF, CON ADITIVO AL 1,5% EN PESO DEL CEMENTO',
                'quantity' => '100',
                'remarks' => '',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'CUNETA DE PIEDRA C/REVESTIMIENTO e = 4 cm DOSIF 1:2:3',
                'quantity' => '500',
                'remarks' => '',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'CORDON DE CONCRETO DE 20 x 30 cm DOSIF 1:2:4',
                'quantity' => '336',
                'remarks' => '',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'PIEDRA DESPLAZADORA DOSIFICACION 1:3:4',
                'quantity' => '200',
                'remarks' => '',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'ACERO ESTRUCTURAL FY=412 MPA',
                'quantity' => '250',
                'remarks' => 'Se debe comprar más.',
            ],
            [
                'name' => 'TUBOS DE DRENAJE C-9 PVC D=4"',
                'quantity' => '100',
                'remarks' => '',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => "HORMIGON SIMPLE F'C=28 MPA - SUPERESTRUCTURA",
                'quantity' => '152',
                'remarks' => '',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => "HORMIGON SIMPLE F'C=25 MPA - INFRAESTRUCTURA",
                'quantity' => '500',
                'remarks' => '',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => "HORMIGON DE LIMPIEZA F'C=11 MPA E=5 CM",
                'quantity' => '300',
                'remarks' => '',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Ladrillo Normal',
                'quantity' => '20000',
                'remarks' => 'Abastecimiento para más de 1 obra en general',
            ],
            [
                'name' => 'Ladrillo Borgoña',
                'quantity' => '10000',
                'remarks' => '',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Ladrillo cara vista',
                'quantity' => '10000',
                'remarks' => '',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Ladrillo hueco',
                'quantity' => '10000',
                'remarks' => 'La cantidad puede variar frecuentemente.',
            ],
            [
                'name' => 'Ladrillos macizos perforados',
                'quantity' => '10000',
                'remarks' => '',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Piedra berroqueña',
                'quantity' => '1452',
                'remarks' => '',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Mármol',
                'quantity' => '300',
                'remarks' => '',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Bolsas de cemento',
                'quantity' => '800',
                'remarks' => '',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Bolsas de estuco',
                'quantity' => '900',
                'remarks' => '',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Vidrios en general',
                'quantity' => '600',
                'remarks' => '',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Láminas de aluminio',
                'quantity' => '250',
                'remarks' => '',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Madera barnizada',
                'quantity' => '1254',
                'remarks' => '',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Madera de pino',
                'quantity' => '1230',
                'remarks' => '',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Madera normal',
                'quantity' => '1563',
                'remarks' => '',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Madera Bambú',
                'quantity' => '987',
                'remarks' => '',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Aislante termo acústico',
                'quantity' => '410',
                'remarks' => '',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ];

        foreach ($materials as $material) {
            Material::insert($material);
        }
    }
}
