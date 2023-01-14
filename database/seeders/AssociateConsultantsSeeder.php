<?php

namespace Database\Seeders;

use App\Models\Associate_consultant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssociateConsultantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $associate_consultants =
        [
            [
                'id' => 1,
                'name' => 'BEDOYA Y ASOCIADOS LTDA'
            ],
            [
                'id' => 2,
                'name' => 'ACEVEDO Y ASOCIADOS CONSULTORES DE EMPRESAS S.R.L.'
            ],
            [
                'id' => 3,
                'name' => 'DELTA CONSULT LTDA'
            ],
            [
                'id' => 4,
                'name' => 'KPMG S.R.L. '
            ],
            [
                'id' => 5,
                'name' => 'VISOR ASOCIADOS S.R.L.'
            ],
            [
                'id' => 6,
                'name' => 'BOLIVIAN AMERICAN CONSULTING S.R.L.'
            ],
            [
                'id' => 7,
                'name' => 'RIOS GENUZIO & ASOCIADOS S.R.L.'
            ],
            [
                'id' => 8,
                'name' => 'ESCOBAR & ASOCIADOS S.R.L'
            ],
            [
                'id' => 9,
                'name' => 'ASIMCO S.R.L.'
            ],
            [
                'id' => 10,
                'name' => 'H. BALDIVIESO & LUNA S.R.L.'
            ],
        ];

        foreach($associate_consultants as $associate_consultant){
            Associate_consultant::insert($associate_consultant);
        }
    }
}
